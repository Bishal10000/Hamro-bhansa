import { motion } from 'framer-motion';

export default function Contact() {
    return (
        <section className="section" id="contact">
            <motion.div
                className="contact-card"
                initial={{ opacity: 0, y: 24 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, amount: 0.3 }}
                transition={{ duration: 0.65 }}
            >
                <p className="eyebrow">Contact</p>
                <h2>Visit us in Kathmandu.</h2>
                <ul>
                    <li>
                        <strong>Address</strong>
                        <span>Durbar Marg, Kathmandu, Nepal</span>
                    </li>
                    <li>
                        <strong>Phone</strong>
                        <span>+977 1-444-8899</span>
                    </li>
                    <li>
                        <strong>Email</strong>
                        <span>namaste@hamrobhansa.com</span>
                    </li>
                    <li>
                        <strong>Hours</strong>
                        <span>Daily, 11:00 AM - 10:30 PM</span>
                    </li>
                </ul>
            </motion.div>
        </section>
    );
}
