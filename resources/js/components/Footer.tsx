export default function Footer() {
    return (
        <footer
            style={{
                background: 'black',
                borderTop: '1px solid rgba(255,255,255,0.18)',
                padding: '2.8rem 1.5rem 3rem',
                textAlign: 'center',
            }}
        >
            <p
                style={{
                    margin: 0,
                    fontFamily: "'Instrument Serif', serif",
                    fontStyle: 'italic',
                    fontSize: '1.65rem',
                    color: 'rgba(255,255,255,0.96)',
                }}
            >
                Hamro Bhansa
            </p>
            <p style={{ margin: '0.65rem 0 0', color: 'rgba(255,255,255,0.76)', fontSize: '0.98rem' }}>
                Cinematic Nepali food stories, recipes, and tradition.
            </p>
            <p style={{ margin: '0.95rem 0 0', color: 'rgba(255,255,255,0.62)', fontSize: '0.85rem' }}>
                © 2026 Hamro Bhansa. All rights reserved.
            </p>
            <div
                style={{
                    marginTop: '0.95rem',
                    display: 'inline-flex',
                    gap: '0.8rem',
                    color: 'rgba(255,255,255,0.68)',
                    fontSize: '0.88rem',
                }}
            >
                <a href="#">About</a>
                <span>·</span>
                <a href="#">Contribute</a>
                <span>·</span>
                <a href="#">Contact</a>
            </div>
        </footer>
    );
}
