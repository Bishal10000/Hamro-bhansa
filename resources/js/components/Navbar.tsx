import { motion } from 'framer-motion';
import { ArrowUpRight } from 'lucide-react';
import { useEffect, useState } from 'react';

const links = [
    { href: '#intro', label: 'Story' },
    { href: '#how-it-works', label: 'How It Works' },
    { href: '#features', label: 'Features' },
];

export default function Navbar() {
    const [scrolled, setScrolled] = useState(false);

    useEffect(() => {
        const onScroll = (): void => {
            setScrolled(window.scrollY > 30);
        };

        onScroll();
        window.addEventListener('scroll', onScroll);

        return () => {
            window.removeEventListener('scroll', onScroll);
        };
    }, []);

    return (
        <motion.header
            initial={{ y: -18, opacity: 0 }}
            animate={{ y: 0, opacity: 1 }}
            transition={{ delay: 0.9, duration: 0.7, ease: [0.16, 1, 0.3, 1] }}
            style={{
                position: 'fixed',
                top: '1rem',
                left: '50%',
                transform: 'translateX(-50%)',
                width: 'min(56rem, calc(100% - 1.5rem))',
                zIndex: 90,
            }}
        >
            <div
                className="liquid-glass"
                style={{
                    height: '3.5rem',
                    borderRadius: '9999px',
                    border: '1px solid rgba(255,255,255,0.22)',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'space-between',
                    padding: '0 0.75rem 0 1rem',
                    boxShadow: scrolled
                        ? '0 12px 30px rgba(0,0,0,0.56), inset 0 1px 1px rgba(255,255,255,0.14)'
                        : '0 6px 18px rgba(0,0,0,0.32), inset 0 1px 1px rgba(255,255,255,0.14)',
                    transition: 'box-shadow 260ms ease',
                }}
            >
                <span
                    style={{
                        fontFamily: "'Instrument Serif', serif",
                        fontStyle: 'italic',
                        color: 'rgba(255,255,255,0.96)',
                        fontSize: '1.12rem',
                        letterSpacing: '0.01em',
                    }}
                >
                    Hamro Bhansa
                </span>

                <div
                    style={{
                        display: 'flex',
                        gap: '1.2rem',
                        color: 'rgba(255,255,255,0.80)',
                        fontFamily: "'Barlow', sans-serif",
                        fontWeight: 400,
                        fontSize: '0.875rem',
                    }}
                >
                    {links.map((link) => (
                        <a key={link.href} href={link.href} style={{ whiteSpace: 'nowrap' }}>
                            {link.label}
                        </a>
                    ))}
                </div>

                <button
                    type="button"
                    style={{
                        border: 0,
                        borderRadius: '9999px',
                        height: '2.35rem',
                        padding: '0 0.95rem',
                        background: 'linear-gradient(135deg, rgba(207,139,63,1) 0%, rgba(145,88,40,1) 100%)',
                        color: 'white',
                        display: 'inline-flex',
                        alignItems: 'center',
                        gap: '0.45rem',
                        fontFamily: "'Barlow', sans-serif",
                        fontWeight: 600,
                        fontSize: '0.85rem',
                        cursor: 'pointer',
                    }}
                >
                    Start Exploring
                    <ArrowUpRight size={14} />
                </button>
            </div>
        </motion.header>
    );
}
