import { motion, useInView } from 'framer-motion';
import { BookHeart, Map, Smartphone, Users } from 'lucide-react';
import type { ComponentType } from 'react';
import { useRef } from 'react';
import { fadeUp } from './motion';

type Feature = {
    icon: ComponentType<{ size?: number; color?: string }>;
    title: string;
    text: string;
};

const features: Feature[] = [
    {
        icon: BookHeart,
        title: 'Authentic Recipes',
        text: 'Every dish sourced from real home cooks and regional traditions. No shortcuts, no fusion gimmicks.',
    },
    {
        icon: Map,
        title: 'Regional Diversity',
        text: "Explore the full spectrum of Nepali cuisine - from Kathmandu's Newari kitchens to Mustang's Thakali hearths.",
    },
    {
        icon: Users,
        title: 'Community Kitchen',
        text: 'Submit your family recipes, leave notes, and connect with cooks who share your roots.',
    },
    {
        icon: Smartphone,
        title: 'Cook Anywhere',
        text: "Clean, step-by-step instructions that work whether you're in Pokhara or Paris.",
    },
];

export default function FeaturesSection() {
    const ref = useRef<HTMLElement | null>(null);
    const inView = useInView(ref, { once: true, margin: '-80px' });

    return (
        <section
            id="features"
            ref={ref}
            style={{
                background: 'black',
                padding: '7rem 1.5rem 9rem',
                position: 'relative',
                overflow: 'hidden',
            }}
        >
            <img
                src="/features-bg.png"
                alt="Dark moody clay pots and spice texture"
                style={{
                    position: 'absolute',
                    inset: 0,
                    width: '100%',
                    height: '100%',
                    objectFit: 'cover',
                    zIndex: 0,
                    pointerEvents: 'none',
                    opacity: 0.58,
                }}
            />

            <div
                style={{
                    position: 'absolute',
                    inset: 0,
                    zIndex: 1,
                    background:
                        'linear-gradient(180deg, black 0%, rgba(0,0,0,0) 16%, rgba(0,0,0,0) 84%, black 100%)',
                }}
            />
            <div style={{ position: 'absolute', inset: 0, zIndex: 1, background: 'rgba(0,0,0,0.46)' }} />

            <div style={{ maxWidth: '56rem', margin: '0 auto', position: 'relative', zIndex: 2, textAlign: 'center' }}>
                <motion.span
                    className="section-badge"
                    custom={0}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                >
                    Why Hamro Bhansa
                </motion.span>

                <motion.h2
                    custom={1}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        fontFamily: "'Instrument Serif', serif",
                        fontStyle: 'italic',
                        fontSize: 'clamp(2.2rem, 5.5vw, 4.2rem)',
                        letterSpacing: '-0.04em',
                        lineHeight: 0.92,
                        margin: 0,
                    }}
                >
                    Crafted for modern cooks.
                    <br />
                    Rooted in old fire.
                </motion.h2>

                <div
                    style={{
                        margin: '2.1rem auto 0',
                        maxWidth: '48rem',
                        display: 'grid',
                        gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))',
                        gap: '0.9rem',
                        textAlign: 'left',
                    }}
                >
                    {features.map((feature, index) => {
                        const Icon = feature.icon;

                        return (
                            <motion.article
                                key={feature.title}
                                custom={index + 2}
                                variants={fadeUp}
                                initial="hidden"
                                animate={inView ? 'visible' : 'hidden'}
                                className="liquid-glass"
                                style={{
                                    border: '1px solid rgba(255,200,100,0.10)',
                                    borderRadius: '1.1rem',
                                    padding: '1.08rem 1.08rem 1.14rem',
                                    background: 'rgba(12,7,4,0.48)',
                                    position: 'relative',
                                }}
                            >
                                <div
                                    style={{
                                        position: 'absolute',
                                        inset: 0,
                                        borderRadius: 'inherit',
                                        pointerEvents: 'none',
                                        background:
                                            'linear-gradient(125deg, rgba(255,200,100,0.18) 0%, rgba(255,200,100,0) 42%, rgba(255,200,100,0) 100%)',
                                        opacity: 0.38,
                                    }}
                                />
                                <Icon size={20} color="rgba(255,220,160,0.94)" />
                                <h3 style={{ margin: '0.8rem 0 0', fontSize: '1.1rem', fontWeight: 500, color: 'rgba(255,235,200,0.95)' }}>
                                    {feature.title}
                                </h3>
                                <p style={{ margin: '0.54rem 0 0', color: 'rgba(255,235,200,0.76)', lineHeight: 1.5 }}>
                                    {feature.text}
                                </p>
                            </motion.article>
                        );
                    })}
                </div>
            </div>
        </section>
    );
}
