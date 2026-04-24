import Navbar from './components/Navbar';
import PageLoader from './components/PageLoader';
import HeroSection from './components/HeroSection';
import IntroSection from './components/IntroSection';
import HowItWorksSection from './components/HowItWorksSection';
import FeaturesSection from './components/FeaturesSection';
import CTASection from './components/CTASection';
import Footer from './components/Footer';

export default function RootApp() {
    return (
        <>
            <div className="grain-overlay" />
            <PageLoader />
            <Navbar />
            <HeroSection />
            <IntroSection />
            <HowItWorksSection />
            <FeaturesSection />
            <CTASection />
            <Footer />
        </>
    );
}
