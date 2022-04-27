import React, { useState, useEffect } from 'react';
import { Button } from './Button';
import { Link } from 'react-router-dom';
import '../../assets/front/Navbar.css';

function Navbar() {
  const [click, setClick] = useState(false); 
  // par defaut le state des clicks est setté à setclick false
  const [button, setButton] = useState(true);
// par defaut le usestate(true) des buttons est unae ction cliquable sur le button 
  const handleClick = () => setClick(!click);
  // Par défault handle click setté a false
  const closeMobileMenu = () => setClick(false);
  //  Par défault handle click du menu setté a false


// le menu s'affiche en dessous de 960px
  const showButton = () => {
    if (window.innerWidth <= 960) {
      setButton(false); // on cache les buttons
    } else {
      setButton(true); // sinon on les affiche
    }
  };

  useEffect(() => { // stocker la fonction showbutton contenant la media query dans un showbutton();
    showButton();
  }, []);

  window.addEventListener('resize', showButton); // ////resize automatique des buttons en fonction
   // de la  la taille du DOM
 
   //retour du resultat
  return (
    <>
      <nav className='navbar'>
        <div className='navbar-container'>
          
          <Link to='/' className='navbar-logo' onClick={closeMobileMenu}>
            SMARTMENU
            <i class='fab fa-typo3' />
          </Link>

     
          <div className='menu-icon' onClick={handleClick}>
            <i className={click ? 'fas fa-times' : 'fas fa-bars'} />    {/* au click afficher licone fermer/ sinon icon burger*/}
          </div>
          <ul className={click ? 'nav-menu active' : 'nav-menu'}>      {/*au click mettre nav en active sinon par défaut*/}
            <li className='nav-item'>
              <Link to='/' className='nav-links' onClick={closeMobileMenu}>   {/* au click de elt fermer la navbar*/}
               Accueil
              </Link>
            </li>
            <li className='nav-item'>
              <Link
                to='/services'
                className='nav-links'
                onClick={closeMobileMenu}
              >
                Services
              </Link>
            </li>
            <li className='nav-item'>
              <Link
                to='/products'
                className='nav-links'
                onClick={closeMobileMenu}
              >
                Produits
              </Link>
            </li>

            <li>
              <Link
                to='/sign-up'
                className='nav-links-mobile'
                onClick={closeMobileMenu}
              >
                S'inscrire
              </Link>
            </li>

              <li>
                <Link 
                to='/Sass/connexion.php'
                className='nav-links-mobile'
                onClick={closeMobileMenu}
                >
                  Connexion
                </Link>
              </li>


          </ul>
          {button && <Button buttonStyle='btn--outline'>S'INSCRIRE</Button>}
          {button && <Button buttonStyle='btn--outline'>SE CONNECTER</Button>}
        </div>
      </nav>
    </>
  );
}

export default Navbar;
