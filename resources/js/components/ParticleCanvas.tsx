import { useEffect, useRef } from 'react';

type Particle = {
    x: number;
    y: number;
    r: number;
    vy: number;
    drift: number;
    alpha: number;
    phase: number;
};

const PARTICLE_COUNT = 60;

export default function ParticleCanvas() {
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

        let width = 0;
        let height = 0;
        let animationFrame = 0;

        const particles: Particle[] = [];

        const resize = (): void => {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;
        };

        const respawn = (particle: Particle): void => {
            particle.x = Math.random() * width;
            particle.y = height * (0.5 + Math.random() * 0.15);
            particle.r = 1.2 + Math.random() * 2.3;
            particle.vy = 0.25 + Math.random() * 0.45;
            particle.drift = (Math.random() - 0.5) * 0.7;
            particle.alpha = 0.2 + Math.random() * 0.42;
            particle.phase = Math.random() * Math.PI * 2;
        };

        resize();

        for (let i = 0; i < PARTICLE_COUNT; i += 1) {
            const particle = { x: 0, y: 0, r: 0, vy: 0, drift: 0, alpha: 0, phase: 0 };
            respawn(particle);
            particle.y += Math.random() * height * 0.35;
            particles.push(particle);
        }

        const tick = (): void => {
            context.clearRect(0, 0, width, height);

            particles.forEach((particle, index) => {
                particle.phase += 0.015;
                particle.y -= particle.vy;
                particle.x += particle.drift + Math.sin(particle.phase + index * 0.23) * 0.15;

                if (particle.y < -20) {
                    respawn(particle);
                }

                context.beginPath();
                context.fillStyle = `rgba(255,235,200,${particle.alpha})`;
                context.arc(particle.x, particle.y, particle.r, 0, Math.PI * 2);
                context.fill();
            });

            animationFrame = requestAnimationFrame(tick);
        };

        tick();
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
