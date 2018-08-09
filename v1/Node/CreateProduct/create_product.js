const axios = require('axios');

var token = '<your_token_here>';

axios.request({
  'url': 'http://api-cs.eduzz.com/ecommerce/product',
  'headers': {'Authorization': `Bearer ${token}`},
  'method': 'POST',
  'data': {
    'config': {
      'lang': 'en'
    },
    'product': {
      'product_title': 'Test product',
      'description': 'This description must have at least 100 characters. It\'s a validation rule. An error will be thrown.',
      'price': 1,
      'currency': 'BRL' //BRL or USD
    }
  }
})
.then(function (response) {
  console.log(response.data);
})
.catch(function (error) {
  console.log(error);
});
