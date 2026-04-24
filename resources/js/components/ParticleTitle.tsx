import { useEffect, useRef } from 'react';

type Dot = {
    x: number;
    y: number;
    ox: number;
    oy: number;
    vx: number;
    vy: number;
};

const REPEL_RADIUS = 90;
const REPEL_STRENGTH = 7;
const SPRING = 0.055;
const FRICTION = 0.8;

export default function ParticleTitle() {
    const canvasRef = useRef<HTMLCanvasElement | null>(null);

    useEffect(() => {
        const canvas = canvasRef.current;
        if (!canvas) {
            return;
        }

        const context = canvas.getContext('2d');
        const offscreen = document.createElement('canvas');
        const offCtx = offscreen.getContext('2d');

        if (!context || !offCtx) {
            return;
        }

        let width = 0;
        let height = 0;
        let animationFrame = 0;
        let dots: Dot[] = [];

        const pointer = { x: -9999, y: -9999 };

        const buildParticles = (): void => {
            width = Math.min(window.innerWidth * 0.92, 960);
            height = Math.min(window.innerHeight * 0.42, 330);
            canvas.width = width;
            canvas.height = height;

            offscreen.width = width;
            offscreen.height = height;

            offCtx.clearRect(0, 0, width, height);
            offCtx.fillStyle = '#fff';
            offCtx.textAlign = 'center';
            offCtx.font = "italic 80px 'Instrument Serif', serif";
            offCtx.textBaseline = 'middle';
            offCtx.fillText('Recipes from the', width / 2, height * 0.4);
            offCtx.fillText('Heart of Nepal', width / 2, height * 0.68);

            const imageData = offCtx.getImageData(0, 0, width, height).data;
            dots = [];

            const step = 4;
            for (let y = 0; y < height; y += step) {
                for (let x = 0; x < width; x += step) {
                    const idx = (y * width + x) * 4 + 3;
                    if (imageData[idx] > 120) {
                        dots.push({ x, y, ox: x, oy: y, vx: 0, vy: 0 });
                    }
                }
            }
        };

        const render = (): void => {
            context.clearRect(0, 0, width, height);
            context.fillStyle = 'rgba(255,235,200,1)';

            for (const dot of dots) {
                const dx = dot.x - pointer.x;
                const dy = dot.y - pointer.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < REPEL_RADIUS) {
                    const force = (1 - distance / REPEL_RADIUS) * REPEL_STRENGTH;
                    const angle = Math.atan2(dy, dx);
                    dot.vx += Math.cos(angle) * force;
                    dot.vy += Math.sin(angle) * force;
                }

                dot.vx += (dot.ox - dot.x) * SPRING;
                dot.vy += (dot.oy - dot.y) * SPRING;
                dot.vx *= FRICTION;
                dot.vy *= FRICTION;
                dot.x += dot.vx;
                dot.y += dot.vy;

                context.fillRect(dot.x, dot.y, 2, 2);
            }

            animationFrame = requestAnimationFrame(render);
        };

        const onMove = (event: PointerEvent): void => {
            const rect = canvas.getBoundingClientRect();
            pointer.x = event.clientX - rect.left;
            pointer.y = event.clientY - rect.top;
        };

        const onLeave = (): void => {
            pointer.x = -9999;
            pointer.y = -9999;
        };

        buildParticles();
        render();

        canvas.addEventListener('pointermove', onMove);
        canvas.addEventListener('pointerleave', onLeave);
        window.addEventListener('resize', buildParticles);

        return () => {
            cancelAnimationFrame(animationFrame);
            canvas.removeEventListener('pointermove', onMove);
            canvas.removeEventListener('pointerleave', onLeave);
            window.removeEventListener('resize', buildParticles);
        };
    }, []);

    return (
        <div style={{ width: '100%', maxWidth: '960px', margin: '1.2rem auto 0' }}>
            <canvas
                ref={canvasRef}
                style={{ width: '100%', height: 'auto', display: 'block', margin: '0 auto' }}
            />
        </div>
    );
}
