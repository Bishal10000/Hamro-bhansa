import { motion } from 'framer-motion';

const dishes = [
    {
        name: 'Dal Bhat',
        description: 'Steamed rice, lentil soup, seasonal tarkari, and house achar.',
        price: 'NPR 690',
    },
    {
        name: 'Momo',
        description: 'Juicy dumplings with roasted tomato-sesame chutney.',
        price: 'NPR 520',
    },
    {
        name: 'Thakali Set',
        description: 'Complete mountain-style platter with ghee rice and curry selections.',
        price: 'NPR 1,050',
    },
    {
        name: 'Sel Roti',
        description: 'Traditional rice ring bread served warm with spiced yogurt.',
        price: 'NPR 390',
    },
    {
        name: 'Newari Khaja',
        description: 'A festive spread of choila, beaten rice, and local seasonal bites.',
        price: 'NPR 1,190',
    },
];

export default function Menu() {
    return (
        <section className="section" id="menu">
            <motion.div
                className="section-head"
                initial={{ opacity: 0, y: 24 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, amount: 0.3 }}
                transition={{ duration: 0.6 }}
            >
                <p className="eyebrow">Our Signature Menu</p>
                <h2>Nepali classics, plated with precision.</h2>
            </motion.div>

            <div className="menu-grid">
                {dishes.map((dish, index) => {
                    return (
                        <motion.article
                            className="menu-card"
                            key={dish.name}
                            initial={{ opacity: 0, y: 20 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            viewport={{ once: true, amount: 0.2 }}
                            transition={{ duration: 0.45, delay: index * 0.08 }}
                        >
                            <h3>{dish.name}</h3>
                            <p>{dish.description}</p>
                            <span>{dish.price}</span>
                        </motion.article>
                    );
                })}
            </div>
        </section>
    );
}
