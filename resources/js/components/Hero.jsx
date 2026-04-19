import { motion } from 'framer-motion';

export default function Hero() {
    const scrollToMenu = () => {
        const section = document.getElementById('menu');

        if (section) {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    return (
        <section className="hero section" id="home">
            <div className="glow glow-left" aria-hidden="true"></div>
            <div className="glow glow-right" aria-hidden="true"></div>
            <motion.p
                className="eyebrow"
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5 }}
            >
                Authentic Nepali Fine Dining
            </motion.p>

            <motion.h1
                className="hero-title"
                initial={{ opacity: 0, y: 24 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.8, delay: 0.2 }}
            >
                Hamro Bhansa
                <span>Where the warmth of Nepal meets modern culinary craft.</span>
            </motion.h1>

            <motion.p
                className="hero-copy"
                initial={{ opacity: 0, y: 18 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.7, delay: 0.35 }}
            >
                Signature thalis, handcrafted spices, and elevated hospitality in the heart of Kathmandu.
            </motion.p>

            <motion.div
                className="hero-actions"
                initial={{ opacity: 0, y: 16 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.65, delay: 0.5 }}
            >
                <button className="cta" onClick={scrollToMenu} type="button">
                    Explore Our Menu
                </button>
                <a className="link-ghost" href="#contact">
                    Book a Table
                </a>
            </motion.div>
        </section>
    );
}
