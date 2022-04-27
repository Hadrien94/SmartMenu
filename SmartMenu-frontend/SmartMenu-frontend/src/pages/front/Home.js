import React from 'react';
import '../../App.css';
import Cards from '../../components/front/Cards';
import HeroSection from '../../components/front/HeroSection';
import Footer from '../../components/front/Footer';

function Home() {
  return (
    <>
      <HeroSection />
      <Cards />
      <Footer />
    </>
  );
}

export default Home;
