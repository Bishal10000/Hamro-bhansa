import { motion, useInView } from 'framer-motion';
import { ArrowUpRight, ChevronRight } from 'lucide-react';
import { useRef } from 'react';
import { fadeUp } from './motion';

export default function CTASection() {
    const ref = useRef<HTMLElement | null>(null);
    const inView = useInView(ref, { once: true, margin: '-80px' });

    return (
        <section
            ref={ref}
            style={{
                background: 'black',
                padding: '7rem 1.5rem 10rem',
                position: 'relative',
            }}
        >
            <div style={{ maxWidth: '48rem', margin: '0 auto', textAlign: 'center' }}>
                <motion.span
                    className="section-badge"
                    custom={0}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                >
                    Join the Table
                </motion.span>

                <motion.h2
                    custom={1}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        margin: 0,
                        fontFamily: "'Instrument Serif', serif",
                        fontStyle: 'italic',
                        fontSize: 'clamp(2.75rem, 7vw, 4.75rem)',
                        lineHeight: 0.92,
                        letterSpacing: '-0.04em',
                    }}
                >
                    Your next favorite
                    <br />
                    dish is waiting.
                </motion.h2>

                <motion.p
                    custom={2}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        margin: '1.25rem auto 0',
                        maxWidth: '40rem',
                        color: 'rgba(255,235,200,0.84)',
                        fontSize: 'clamp(1rem, 2vw, 1.2rem)',
                        lineHeight: 1.56,
                    }}
                >
                    Build your personal collection, cook with confidence, and carry Nepali culinary memory forward.
                </motion.p>

                <motion.div
                    custom={3}
                    variants={fadeUp}
                    initial="hidden"
                    animate={inView ? 'visible' : 'hidden'}
                    style={{
                        marginTop: '1.7rem',
                        display: 'flex',
                        justifyContent: 'center',
                        gap: '0.85rem',
                        flexWrap: 'wrap',
                    }}
                >
                    <button
                        type="button"
                        className="liquid-glass-strong"
                        style={{
                            border: '1px solid rgba(255,210,140,0.26)',
                            borderRadius: '9999px',
                            height: '3rem',
                            padding: '0 1.15rem',
                            color: 'rgba(255,235,200,0.95)',
                            display: 'inline-flex',
                            alignItems: 'center',
                            gap: '0.45rem',
                            cursor: 'pointer',
                        }}
                    >
                        Browse Recipes
                        <ArrowUpRight size={16} />
                    </button>

                    <button
                        type="button"
                        className="liquid-glass"
                        style={{
                            border: '1px solid rgba(255,210,140,0.22)',
                            borderRadius: '9999px',
                            height: '3rem',
                            padding: '0 1.15rem',
                            color: 'rgba(255,235,200,0.9)',
                            display: 'inline-flex',
                            alignItems: 'center',
                            gap: '0.45rem',
                            cursor: 'pointer',
                        }}
                    >
                        Share a Family Recipe
                        <ChevronRight size={16} />
                    </button>
                </motion.div>
            </div>
        </section>
    );
}
