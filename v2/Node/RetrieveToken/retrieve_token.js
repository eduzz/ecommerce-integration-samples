const axios = require('axios');

axios.post('http://api-cs.eduzz.com/ecommerce/token', {
  'email': 'test@gmail.com',
  'public_key': '124456',
  'api_key': '123456'
})
.then(function (response) {
  console.log(response.data.token);
})
.catch(function (error) {
  console.log(error);
});
