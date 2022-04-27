import React from 'react';
import '../../assets/front/Footer.css';
import { Button } from './Button';
import { Link } from 'react-router-dom';

function Footer() {
  return (
    <div className='footer-container'>
      <section className='footer-subscription'>
        <p className='footer-subscription-heading'>
         Inscrivez à note newsletter pour ne pas rater de réduction sur votre abonnement
        </p>
        <p className='footer-subscription-text'>
          Vous pouvez vous déinscrire à tout moment
        </p>
        <div className='input-areas'>
          <form>
            <input
              className='footer-input'
              name='email'
              type='email'
              placeholder='Votre email'
            />
            <Button buttonStyle='btn--outline'>S'isncrire</Button>
          </form>
        </div>
      </section>
      <div class='footer-links'>
        <div className='footer-link-wrapper'>
          <div class='footer-link-items'>
            <h2>A Propos</h2>
            <Link to='/sign-up'>Comment ca marche</Link>
            <Link to='/'>Ils parlent de nous</Link>
            <Link to='/'>Carrière</Link>
            <Link to='/'>Investisseurs</Link>
            <Link to='/'>Mentions légales</Link>
          </div>
          <div class='footer-link-items'>
            <h2>Contactez nous</h2>
            <Link to='/'>Contact</Link>
            <Link to='/'>Support</Link>
            <Link to='/'>nos clients</Link>
            <Link to='/'>Programme de fidélité</Link>
          </div>
        </div>
        <div className='footer-link-wrapper'>
          <div class='footer-link-items'>
            <h2>Réseaux sociaux</h2>
            <Link to='/'>Youtube</Link>
            <Link to='/'>Linkedin</Link>
            <Link to='/'>Instagram</Link>
            <Link to='/'>Facebook</Link>
          </div>
          <div class='footer-link-items'>
            <h2>Autres</h2>
            <Link to='/'>Influenceurs</Link>
            <Link to='/'>Relations Presse</Link>
            <Link to='/'>BLog</Link>
            <Link to='/'>FAQ</Link>
          </div>
        </div>
      </div>
      <section class='social-media'>
        <div class='social-media-wrap'>
          <div class='footer-logo'>
            <Link to='/' className='social-logo'>
             SMARTMENU
              <i class='fab fa-typo3' />
            </Link>
          </div>
          <small class='website-rights'>SMARTMENU © 2022</small>
          <div class='social-icons'>
            <Link
              class='social-icon-link facebook'
              to='/'
              target='_blank'
              aria-label='Facebook'
            >
              <i class='fab fa-facebook-f' />
            </Link>
            <Link
              class='social-icon-link instagram'
              to='/'
              target='_blank'
              aria-label='Instagram'
            >
              <i class='fab fa-instagram' />
            </Link>
            <Link
              class='social-icon-link youtube'
              to='/'
              target='_blank'
              aria-label='Youtube'
            >
              <i class='fab fa-youtube' />
            </Link>
            <Link
              class='social-icon-link twitter'
              to='/'
              target='_blank'
              aria-label='Twitter'
            >
              <i class='fab fa-twitter' />
            </Link>
            <Link
              class='social-icon-link twitter'
              to='/'
              target='_blank'
              aria-label='LinkedIn'
            >
              <i class='fab fa-linkedin' />
            </Link>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Footer;
