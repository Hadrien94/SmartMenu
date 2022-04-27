import React from 'react';
import '../../assets/front/Cards.css';
import CardItem from './CardItem';



export default class Cards extends React.Component {
  // state = {
  //   institutions: []
  // };



  componentDidMount = async () => {
    /*     const parseJSON = resp => (resp.json ? resp.json() : resp);
    
        const checkStatus = resp => {
          if (resp.status >= 200 && resp.status < 300) {
            return resp;
          }
          return parseJSON(resp).then(resp => {
            throw resp;
          });
        };
     */
    const headers = {
      'Content-Type': 'application/json',
    };

    try {
      const response = await fetch('http://127.0.0.1:8000/institutions/', {
        method: 'GET',
        headers: headers,
      });


      let allInstitutions = await response.json();


      console.log(allInstitutions);


      /*       this.setState({ allPlats }); */
    } catch (error) {
      this.setState({ error });
    };


  };




  render() {
    //const { institutions } = this.state;




    return (
      <>
        <div className='cards'>
          <h1>Voir notre offre de menus proposés</h1>
          <div className='cards__container'>
            <ul className='cards__items'>
              <CardItem
                src='images/img-9.jpg'
                text='Menu Plat du Jour'
                label='Plat du jour'
                path='/services'
              />
              <CardItem
                src='images/img-2.jpg'
                text='Entrée/Plat/Dessert'
                label='Standard'
                path='/services'
              />
            </ul>
            <ul className='cards__items'>
              <CardItem
                src='images/img-3.jpg'
                text='Plat seul'
                label='seul'
                path='/services'
              />
              <CardItem
                src='images/img-4.jpg'
                text='A la carte'
                label='a la carte'
                path='/products'
              />
              <CardItem
                src='images/img-8.jpg'
                text='Menu enfant'
                label='kids'
                path='/sign-up'
              />
            </ul>
          </div>
        </div>
      </>
    );
  }

}



