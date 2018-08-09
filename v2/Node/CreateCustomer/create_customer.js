const axios = require('axios');

var token = '<your_token_here>';

axios.request({
  'url': 'http://api-cs.eduzz.com/ecommerce/customer',
  'headers': {'Authorization': `Bearer ${token}`},
  'method': 'POST',
  'data': {
    'config': {
      'lang': 'en'
    },
    'customer': {
      'name': 'Jose do teste do e-commerce',
      'email': 'josedotest@test.com',
      'document': '78272864029',
      'cellphone': '15989898585'
    }
  }
})
.then(function (response) {
  console.log(response.data);
})
.catch(function (error) {
  console.log(error);
});
