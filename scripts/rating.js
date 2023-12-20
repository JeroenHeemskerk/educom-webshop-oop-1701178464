function showAvgStars(productId, rating, starId){
  const parent = $(".stars[data-product-id = 'avg" + productId + starId + "']")
  if (parent == undefined){
    return
  }
  parent.empty()
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
  parent.empty()
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
    starLocation.click( function(){
      const value = $(this).attr('data-product-id')
      $.ajax({
        url: "http://localhost/educom-webshop-oop-1701178464/business/index.php",
        method: "POST",
        data: { 
          "productRating": value,
          "action": "rateProduct",
          "page": "ajax"
        },
      })
      retrieveRatings()
    })
  }
)

function retrieveRating(productId){
  $.get("index.php?page=ajax&action=getRating&rating="+productId, 
  function (data, status){
    const output = JSON.parse(data)
    const avgRatings = output[0]
    const myRatings = output[1]
    avgRatings.forEach(rating => {
      for (let i = 1; i != 6; i++){
        showAvgStars(rating.productId, rating.rating, i)
      }
    })
    for (let i = 1; i != 6; i++) {
      for (let j = 1; j != 6; j++){
        showMyStars(i, 0, j)
      }
    } 
    myRatings.forEach(rating => {
      for (let i = 1; i != 6; i++){
        showMyStars(rating.productId, rating.rating, i)
      }
    })
  })
}

function retrieveRatings(){
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
    for (let i = 1; i != 6; i++) {
      for (let j = 1; j != 6; j++){
        showMyStars(i, 0, j)
      }
    } 
    myRatings.forEach(rating => {
      for (let i = 1; i != 6; i++){
        showMyStars(rating.productId, rating.rating, i)
      }
    })
  })
}