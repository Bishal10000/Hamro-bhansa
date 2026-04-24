import { AnimatePresence, motion } from 'framer-motion';
import { useEffect, useState } from 'react';

export default function PageLoader() {
    const [visible, setVisible] = useState(true);

    useEffect(() => {
        const timer = window.setTimeout(() => {
            setVisible(false);
        }, 2200);

        return () => {
            window.clearTimeout(timer);
        };
    }, []);

    return (
        <AnimatePresence>
            {visible ? (
                <motion.div
                    initial={{ opacity: 1 }}
                    animate={{ opacity: 0 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 1.4, delay: 0.5, ease: [0.22, 1, 0.36, 1] }}
                    style={{
                        position: 'fixed',
                        inset: 0,
                        background: 'hsl(20 10% 4%)',
                        zIndex: 120,
                        pointerEvents: 'none',
                    }}
                />
            ) : null}
        </AnimatePresence>
    );
}
