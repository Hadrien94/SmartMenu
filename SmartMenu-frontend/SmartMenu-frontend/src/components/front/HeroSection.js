import React from 'react';
import '../../App.css';
import { Button } from './Button';
import '../../assets/front/HeroSection.css';

function HeroSection() {
  return (
    <div className='hero-container'>
      <video src='/videos/homepizza.mp4' autoPlay loop muted />
      <h1>Gestion de menu professionel</h1>
      <p className='text'>Application SMARTMENU, soyez au plus proches de vos clients</p>
      <div className='hero-btns'>
        <Button
          className='btns'
          buttonStyle='btn--outline'
          buttonSize='btn--large'
        >
          COMMENCEZ
        </Button>
        <Button
          className='btns'
          buttonStyle='btn--primary'
          buttonSize='btn--large'
          onClick={console.log('hey')}
        >
          Voir notre démo<i className='far fa-play-circle' />
        </Button>
      </div>
    </div>
  );
}

export default HeroSection;
