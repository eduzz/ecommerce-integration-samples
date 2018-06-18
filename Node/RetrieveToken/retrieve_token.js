const axios = require('axios');

axios.post('http://api-cs.eduzz.com/ecommerce/token', {
  'email': 'brunoleonel.eduzz@gmail.com',
  'password': 'bl@eduzz'
})
.then(function (response) {
  console.log(response.data.token);
})
.catch(function (error) {
  console.log(error);
});
