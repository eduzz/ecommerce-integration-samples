using System;
using Newtonsoft.Json;
using System.IO;
using System.Text;
using RestSharp;
using RestSharp.Authenticators;

namespace RetrieveToken
{
    [JsonObject]
    class Credentials
    {   
        [JsonProperty("email")]
        public String Email {get;set;}
        [JsonProperty("public_key")]
        public String PublicKey {get;set;}
        [JsonProperty("api_key")]
        public String APIKey {get;set;}
        [JsonProperty("token")]
        public String Token {get;set;}
    }

    class Program
    {
        static void Main(string[] args)
        {
            var credentials = new Credentials 
            {
                Email = "<my_eduzz_account_login>",
                PublicKey = "<my_eduzz_account_public_key>",
                APIKey = "<my_eduzz_account_api_key>"
            };

            string url = "http://api-cs.eduzz.com/ecommerce/token";
            var data = JsonConvert.SerializeObject(credentials);
            
            var client = new RestClient(url);
            var request = new RestRequest(Method.POST);
            request.AddHeader("Content-type", "application/json");
            request.AddParameter("", JsonConvert.SerializeObject(credentials), ParameterType.RequestBody);
            var response = client.Execute(request);

            var token = JsonConvert.DeserializeObject<Credentials>(response.Content);

            Console.WriteLine(token.Token);
        }
    }
}
