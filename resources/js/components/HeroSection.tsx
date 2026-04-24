import { motion } from 'framer-motion';
import { ArrowUpRight } from 'lucide-react';

export default function HeroSection() {
    return (
        <section
            id="hero"
            style={{
                minHeight: '100vh',
                background: 'black',
                overflow: 'hidden',
                position: 'relative',
            }}
        >
            <img
                src="/hero-bg.png"
                alt="Nepali kitchen at golden hour"
                className="hero-glow"
                style={{
                    position: 'absolute',
                    inset: 0,
                    width: '100%',
                    height: '100%',
                    objectFit: 'cover',
                    objectPosition: 'center',
                }}
            />

            <div
                style={{
                    position: 'absolute',
                    inset: 0,
                    background: 'linear-gradient(180deg, rgba(0,0,0,0.68) 0%, rgba(0,0,0,0.46) 35%, rgba(0,0,0,0.86) 100%)',
                }}
            />

            <motion.div
                initial={{ opacity: 0, y: 26 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.8, duration: 0.9, ease: [0.16, 1, 0.3, 1] }}
                style={{ position: 'relative', zIndex: 5, minHeight: '100vh', display: 'grid', placeItems: 'center', padding: '7rem 1.5rem 4rem' }}
            >
                <div style={{ textAlign: 'center', maxWidth: '62rem' }}>
                    <span
                        className="section-badge"
                        style={{
                            marginBottom: '1.2rem',
                            borderColor: 'rgba(255,255,255,0.26)',
                            background: 'rgba(255,255,255,0.09)',
                        }}
                    >
                        Mountain Kitchens. Timeless Flavors.
                    </span>

                    <h1
                        style={{
                            margin: 0,
                            fontFamily: "'Instrument Serif', serif",
                            fontStyle: 'italic',
                            fontSize: 'clamp(3rem, 8vw, 7.2rem)',
                            letterSpacing: '-0.04em',
                            lineHeight: 0.9,
                        }}
                    >
                        Hamro Bhansa
                    </h1>

                    <p
                        style={{
                            margin: '1rem auto 0',
                            maxWidth: '44rem',
                            color: 'rgba(255,255,255,0.88)',
                            fontSize: 'clamp(1.05rem, 2vw, 1.35rem)',
                            lineHeight: 1.5,
                        }}
                    >
                        The soul of Nepali food culture in one cinematic recipe platform.
                    </p>

                    <motion.div
                        initial={{ opacity: 0, y: 18 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ delay: 1.15, duration: 0.7 }}
                        style={{ marginTop: '1.7rem', display: 'flex', justifyContent: 'center', gap: '0.8rem', flexWrap: 'wrap' }}
                    >
                        <a
                            href="#features"
                            className="liquid-glass-strong"
                            style={{
                                border: '1px solid rgba(255,255,255,0.26)',
                                borderRadius: '9999px',
                                height: '3rem',
                                padding: '0 1.12rem',
                                display: 'inline-flex',
                                alignItems: 'center',
                                gap: '0.45rem',
                                color: 'white',
                                textDecoration: 'none',
                            }}
                        >
                            Explore Recipes
                            <ArrowUpRight size={16} />
                        </a>

                        <a
                            href="#how-it-works"
                            className="liquid-glass"
                            style={{
                                border: '1px solid rgba(255,255,255,0.22)',
                                borderRadius: '9999px',
                                height: '3rem',
                                padding: '0 1.12rem',
                                display: 'inline-flex',
                                alignItems: 'center',
                                gap: '0.45rem',
                                color: 'rgba(255,255,255,0.9)',
                                textDecoration: 'none',
                            }}
                        >
                            Our Process
                        </a>
                    </motion.div>
                </div>
            </motion.div>

            <motion.div
                animate={{ opacity: [0.2, 0.45, 0.2] }}
                transition={{ duration: 4.5, repeat: Infinity, ease: 'easeInOut' }}
                style={{
                    position: 'absolute',
                    bottom: '2.2rem',
                    left: '50%',
                    transform: 'translateX(-50%)',
                    zIndex: 6,
                    width: '1px',
                    height: '44px',
                    background: 'linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.75) 100%)',
                }}
            />

            <div
                style={{
                    position: 'absolute',
                    left: 0,
                    right: 0,
                    bottom: 0,
                    height: '22%',
                    zIndex: 6,
                    background: 'linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.46) 45%, black 100%)',
                }}
            />
        </section>
    );
}
