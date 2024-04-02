
const container = document.querySelector(".container");
const showMovies = document.querySelector(".container .show-movies");

// Get Repos
async function getData() {
    const respons = await fetch("./JSON/playlist.json");
    const data = await respons.json();
    data.forEach(key => {
        createElementOnPage(key)
    });
}

function createElementOnPage(keyOfData) {
    if((keyOfData.movieTitleInEnglish !== "" || keyOfData.movieTitleInArabic !== "") && (keyOfData.storyAboutInEnglish !== "" || keyOfData.storyAboutInArabic)) {
        const movieContainer = document.createElement("div");
        movieContainer.classList.add("movie-container");
        
        const imgMovie = document.createElement("img");
        imgMovie.classList.add("img-movie");
        imgMovie.src = keyOfData.movieImgURL;
        movieContainer.appendChild(imgMovie);
    
        const descriptionMovie = document.createElement("div"); 
        descriptionMovie.classList.add("description-movie")

        const movieTitle = document.createElement("h4");
        movieTitle.classList.add("movie-title");
        const movieTitleText = document.createTextNode(keyOfData.movieTitleInEnglish); 
        movieTitle.appendChild(movieTitleText);
        descriptionMovie.appendChild(movieTitle);

        const movieStory = document.createElement("p");
        movieStory.classList.add("movie-story");
        const movieStoryText = document.createTextNode(keyOfData.storyAboutInEnglish); 
        movieStory.appendChild(movieStoryText);
        descriptionMovie.appendChild(movieStory);

        movieContainer.appendChild(descriptionMovie);

        showMovies.appendChild(movieContainer);
    }
}



window.onload =  getData();