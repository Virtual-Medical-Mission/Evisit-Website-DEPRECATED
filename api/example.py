import requests


def clientIPv4 ():
    url = 'https://vmm-evisit.azurewebsites.net/api/ip.php'
    request = {
        "auth_key" : "5a3604d0c47ae9ec0eb59bf5f509899d935403c61ec4cdcf564b3e14467e0f699474101ff9b91b53581d673c6b2243eb2b8e40ae021f206b0fe4274d260d9bdda78e272bfb6a6442d872c3f0fa582cb693bd0cf9e842b999a06631304fcced8bf6d37cc1a787c2f0e5eb305e060928838b5ccfc8ab9b161d90b8e0eb5fa75ecec5618b7383cdf484da947ddab25d058ee902eb43af9dec0f27fbbc0aec8dae01"
    }
    response = requests.post(url, data=request)
    return response.text



print( clientIPv4() )