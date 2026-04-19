import { motion } from 'framer-motion';

export default function About() {
    return (
        <section className="section about" id="about">
            <motion.div
                className="about-panel"
                initial={{ opacity: 0, y: 24 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, amount: 0.35 }}
                transition={{ duration: 0.65 }}
            >
                <p className="eyebrow">About Us</p>
                <h2>Hamro Bhansa is a tribute to Nepali culinary heritage.</h2>
                <p>
                    We reinterpret timeless home-style recipes with refined techniques, thoughtful presentation, and
                    heartfelt service. From the depth of our house-ground masalas to the gentle aroma of ghee, every
                    detail is crafted to celebrate the spirit of Nepal.
                </p>
                <p>
                    Our kitchen works with local producers around the valley, preserving authentic flavors while
                    elevating every plate for a modern dining experience.
                </p>
            </motion.div>
        </section>
    );
}
