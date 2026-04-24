import { useEffect, useRef } from 'react';

type Mote = {
    x: number;
    y: number;
    radius: number;
    vx: number;
    vy: number;
    opacity: number;
};

const MOTE_COUNT = 200;

export default function AtmosphereCanvas() {
    const canvasRef = useRef<HTMLCanvasElement | null>(null);

    useEffect(() => {
        const canvas = canvasRef.current;
        if (!canvas) {
            return;
        }

        const context = canvas.getContext('2d');
        if (!context) {
            return;
        }

        let animationFrame = 0;
        let width = 0;
        let height = 0;

        const motes: Mote[] = [];

        const resize = (): void => {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;
        };

        const resetMote = (mote: Mote, randomY = true): void => {
            mote.x = Math.random() * width;
            mote.y = randomY ? Math.random() * height : height + Math.random() * 120;
            mote.radius = 0.7 + Math.random() * 2.3;
            mote.vx = -0.15 + Math.random() * 0.3;
            mote.vy = -0.55 - Math.random() * 0.85;
            mote.opacity = 0.05 + Math.random() * 0.3;
        };

        resize();

        for (let i = 0; i < MOTE_COUNT; i += 1) {
            const mote = { x: 0, y: 0, radius: 0, vx: 0, vy: 0, opacity: 0 };
            resetMote(mote);
            motes.push(mote);
        }

        const draw = (): void => {
            context.clearRect(0, 0, width, height);

            for (const mote of motes) {
                mote.x += mote.vx + Math.sin(mote.y * 0.005) * 0.08;
                mote.y += mote.vy;

                if (mote.y < -20 || mote.x < -30 || mote.x > width + 30) {
                    resetMote(mote, false);
                }

                context.beginPath();
                context.fillStyle = `rgba(255,220,160,${mote.opacity})`;
                context.arc(mote.x, mote.y, mote.radius, 0, Math.PI * 2);
                context.fill();
            }

            animationFrame = requestAnimationFrame(draw);
        };

        draw();
        window.addEventListener('resize', resize);

        return () => {
            cancelAnimationFrame(animationFrame);
            window.removeEventListener('resize', resize);
        };
    }, []);

    return (
        <canvas
            ref={canvasRef}
            style={{
                position: 'absolute',
                inset: 0,
                width: '100%',
                height: '100%',
                zIndex: 2,
                pointerEvents: 'none',
            }}
        />
    );
}
