import { motion, useInView } from 'framer-motion';
import { BookOpen, ChefHat, UtensilsCrossed } from 'lucide-react';
import type { ComponentType } from 'react';
import { useRef } from 'react';
import { fadeUp } from './motion';

type Step = {
    icon: ComponentType<{ size?: number; color?: string }>;
    title: string;
    text: string;
};

const steps: Step[] = [
    {
        icon: UtensilsCrossed,
        title: 'Choose a Recipe',
        text: "Browse thousands of dishes by region, season, or what's in your pantry.",
    },
    {
        icon: BookOpen,
        title: 'Follow the Story',
        text: 'Each recipe comes with cultural context, tips, and the tradition behind the dish.',
    },
    {
        icon: ChefHat,
        title: 'Cook & Share',
        text: 'Make it your own, save favourites, and share with your community.',
    },
];

export default function HowItWorksSection() {
    const ref = useRef<HTMLElement | null>(null);
    const inView = useInView(ref, { once: true, margin: '-80px' });

    return (
        <section
            id="how-it-works"
            ref={ref}
            style={{
                background: 'black',
                padding: '10rem 1.5rem 14rem',
                position: 'relative',
                overflow: 'hidden',
            }}
        >
            <motion.img
                src="/section3-bg.png"
                alt="Misty hills and hearth"
                animate={{ scale: [1.06, 1.12, 1.06], x: ['0%', '-2%', '0%'], y: ['0%', '-1.5%', '0%'] }}
                transition={{ duration: 16, repeat: Infinity, ease: 'easeInOut' }}
                style={{
                    position: 'absolute',
                    inset: 0,
                    width: '100%',
                    height: '100%',
                    objectFit: 'cover',
                    objectPosition: 'center center',
                    transformOrigin: 'center center',
                    zIndex: 0,
                }}
            />

            <div
                style={{
                    position: 'absolute',
                    inset: 0,
                    zIndex: 1,
                    background:
                        'linear-gradient(180deg, black 0%, rgba(0,0,0,0.78) 10%, rgba(0,0,0,0.42) 20%, rgba(0,0,0,0) 38%, rgba(0,0,0,0) 72%, rgba(0,0,0,0.65) 88%, black 100%)',
                }}
            />
            <div
                style={{
                    position: 'absolute',
                    inset: 0,
                    zIndex: 1,
                    background:
                        'linear-gradient(90deg, black 0%, rgba(0,0,0,0) 18%, rgba(0,0,0,0) 82%, black 100%)',
                }}
            />
            <div style={{ position: 'absolute', inset: 0, zIndex: 1, background: 'rgba(0,0,0,0.42)' }} />

            <div style={{ maxWidth: '64rem', margin: '0 auto', position: 'relative', zIndex: 2, textAlign: 'center' }}>
                <motion.span
                    className="section-badge"
                    custom={0}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                >
                    How It Works
                </motion.span>

                <motion.h2
                    custom={1}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        fontFamily: "'Instrument Serif', serif",
                        fontStyle: 'italic',
                        fontSize: 'clamp(2.4rem, 6.2vw, 4.4rem)',
                        letterSpacing: '-0.04em',
                        lineHeight: 0.92,
                        margin: 0,
                    }}
                >
                    Find a dish.
                    <br />
                    Follow the flame.
                </motion.h2>

                <motion.p
                    custom={2}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        margin: '1.3rem auto 0',
                        maxWidth: '50rem',
                        fontFamily: "'Barlow', sans-serif",
                        fontWeight: 300,
                        fontSize: 'clamp(1rem, 2vw, 1.22rem)',
                        lineHeight: 1.56,
                        color: 'rgba(255,235,200,0.84)',
                    }}
                >
                    Discover recipes by region and mood, follow immersive steps, and recreate traditional Nepali flavors with confidence and context.
                </motion.p>

                <div
                    style={{
                        display: 'grid',
                        gridTemplateColumns: 'repeat(auto-fit, minmax(240px, 1fr))',
                        gap: '1rem',
                        marginTop: '2rem',
                        textAlign: 'left',
                    }}
                >
                    {steps.map((step, index) => {
                        const Icon = step.icon;

                        return (
                            <motion.article
                                key={step.title}
                                custom={index + 3}
                                variants={fadeUp}
                                initial="hidden"
                                animate={inView ? 'visible' : 'hidden'}
                                className="liquid-glass"
                                style={{
                                    border: '1px solid rgba(255,200,100,0.12)',
                                    borderRadius: '1.25rem',
                                    padding: '1.15rem 1.1rem',
                                    background: 'rgba(15,9,5,0.46)',
                                }}
                            >
                                <Icon size={20} color="rgba(255,210,140,0.95)" />
                                <h3
                                    style={{
                                        margin: '0.78rem 0 0',
                                        fontSize: '1.14rem',
                                        fontWeight: 500,
                                        color: 'rgba(255,235,200,0.95)',
                                    }}
                                >
                                    {step.title}
                                </h3>
                                <p style={{ margin: '0.55rem 0 0', color: 'rgba(255,235,200,0.78)', lineHeight: 1.52 }}>
                                    {step.text}
                                </p>
                            </motion.article>
                        );
                    })}
                </div>
            </div>
        </section>
    );
}
