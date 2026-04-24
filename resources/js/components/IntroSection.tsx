import { motion, useInView } from 'framer-motion';
import { useRef } from 'react';
import { fadeUp } from './motion';

export default function IntroSection() {
    const ref = useRef<HTMLElement | null>(null);
    const inView = useInView(ref, { once: true, margin: '-80px' });

    return (
        <section
            id="intro"
            ref={ref}
            style={{
                background: 'black',
                padding: '10rem 1.5rem 14rem',
                position: 'relative',
                overflow: 'hidden',
            }}
        >
            <img
                src="/intro-bg.png"
                alt="Spice texture and wooden board"
                style={{
                    position: 'absolute',
                    inset: 0,
                    width: '100%',
                    height: '100%',
                    objectFit: 'cover',
                    zIndex: 0,
                    pointerEvents: 'none',
                    opacity: 0.54,
                }}
            />

            <div
                style={{
                    position: 'absolute',
                    inset: 0,
                    zIndex: 1,
                    background:
                        'linear-gradient(180deg, black 0%, rgba(0,0,0,0.08) 18%, rgba(0,0,0,0.08) 82%, black 100%)',
                }}
            />
            <div style={{ position: 'absolute', inset: 0, zIndex: 1, background: 'rgba(0,0,0,0.48)' }} />

            <div style={{ maxWidth: '48rem', margin: '0 auto', position: 'relative', zIndex: 3, textAlign: 'center' }}>
                <motion.span
                    className="section-badge"
                    custom={0}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                >
                    Origin Story
                </motion.span>

                <motion.h2
                    custom={1}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        fontFamily: "'Instrument Serif', serif",
                        fontStyle: 'italic',
                        fontSize: 'clamp(2.5rem, 6vw, 4.5rem)',
                        letterSpacing: '-0.04em',
                        lineHeight: 0.92,
                        margin: 0,
                    }}
                >
                    Ancient fire, patient hands,
                    <br />
                    unforgettable flavors.
                </motion.h2>

                <motion.p
                    custom={2}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        margin: '1.4rem auto 0',
                        maxWidth: '41rem',
                        fontFamily: "'Barlow', sans-serif",
                        fontWeight: 300,
                        fontSize: 'clamp(1.02rem, 2vw, 1.3rem)',
                        lineHeight: 1.52,
                        color: 'rgba(255,235,200,0.84)',
                    }}
                >
                    Hamro Bhansa preserves ancestral recipes from across Nepal, translating memory, ritual, and taste into guided cooking experiences for a new generation.
                </motion.p>

                <motion.p
                    custom={3}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        margin: '2rem 0 0',
                        fontFamily: "'Barlow', sans-serif",
                        fontWeight: 300,
                        fontSize: '0.875rem',
                        letterSpacing: '0.12em',
                        textTransform: 'uppercase',
                        color: 'rgba(255,210,140,0.45)',
                    }}
                >
                    Newari · Thakali · Madheshi · Sherpa · Pahadi · Rai & Limbu
                </motion.p>
            </div>
        </section>
    );
}
