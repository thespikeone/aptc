

async function getusers(){
    let reponse = await fetch("http://127.0.0.34/money/MoneyPROJECTFINAL/accshop/api/numuser/1");
    let data = await reponse.json()
    return data;
   
}
getusers();
console.log(data);