function showAvgStars(productId, rating, starId){
  const parent = $(".stars[data-product-id = 'avg" + productId + starId + "']")
  if (parent == undefined){
    return
  }
    const star = document.createElement("span")
    if (starId <= rating){
      star.innerHTML = "&#9733;"
    } else {
      star.innerHTML = "&#9734;"
    }
    parent.append(star)
}

function showMyStars(productId, rating, starId){
  const parent = $(".stars[data-product-id = 'my" + productId + starId + "']")
  if (parent == undefined){
    return
  }
    const star = document.createElement("span")
    if (starId <= rating){
      star.innerHTML = "&#9733;"
    } else {
      star.innerHTML = "&#9734;"
    }
    parent.append(star)
}

$(document).ready(
    function(){
      const starLocation = $(".stars")
      if (starLocation.length == 0){return}
      if (starLocation.length == 1){
        const productId = starLocation[0].dataset["productId"]
        retrieveRating(productId)
      } else {
        retrieveRatings()
      }
    }
)

function retrieveRating(productId){
    console.log(["1"])
  $.get("index.php?page=ajax&action=getRating&id="+productId, 
  function (data, status){
    console.log(status)
  })
}

function retrieveRatings(){
  console.log(["1"])
  $.get("index.php?page=ajax&action=getRatings", 
  function (data, status){
    const output = JSON.parse(data)
    const avgRatings = output[0]
    const myRatings = output[1]
    avgRatings.forEach(rating => {
      for (let i = 1; i != 6; i++){
        showAvgStars(rating.productId, rating.rating, i)
      }
    })
    myRatings.forEach(rating => {
      for (let i = 1; i != 6; i++){
        showMyStars(rating.productId, rating.rating, i)
      }
    })
    console.log(data)
    console.log(status)
  })
}