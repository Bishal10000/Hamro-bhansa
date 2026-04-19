import { motion } from 'framer-motion';
import About from './components/About';
import Contact from './components/Contact';
import Hero from './components/Hero';
import Menu from './components/Menu';

export default function App() {
    return (
        <div className="app-shell">
            <motion.header
                className="site-header"
                initial={{ opacity: 0, y: -16 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5 }}
            >
                <a className="brand" href="#home">
                    Hamro Bhansa
                </a>
                <nav>
                    <a href="#menu">Menu</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                </nav>
            </motion.header>

            <main>
                <Hero />
                <Menu />
                <About />
                <Contact />
            </main>

            <footer className="site-footer">
                <p>Hamro Bhansa - Premium Nepali Restaurant Experience</p>
            </footer>
        </div>
    );
}
