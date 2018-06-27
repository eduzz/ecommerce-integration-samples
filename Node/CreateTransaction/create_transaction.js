const axios = require('axios');

var token = '<your_token_here>';

axios.request({
  'url': 'http://api-cs.eduzz.com/ecommerce/transaction',
  'headers': {'Authorization': `Bearer ${token}`},
  'method': 'POST',
  'data': {
    'config': {
      'lang': 'en'
    },
    'transaction': {
      'order_id': '12345',
      'return_url': 'http://test.com',
      'postback_url': 'http://test.com/postback',
      'installments': 1,
      'items': [
        {
          'product_id': 0, //Product ID
          'checkout_product_id': 0, //Checkout product ID
          'description': 'Integration test product',
          'price': 1.1,
          'amount': 1
        }
      ],
      'customer': {
        'name': 'Jose do teste do e-commerce',
        'email': 'josedotest@test.com',
        'document': '78272864029',
        'cellphone': '15989898585',
        'person_type': 'F' //F - Person | J - Entreprise
      }
    }
  }
})
.then(function (response) {
  console.log(response.data);
  console.log(`Your payment URL is: ${response.data.payment_url}`);
})
.catch(function (error) {
  console.log(error);
});
