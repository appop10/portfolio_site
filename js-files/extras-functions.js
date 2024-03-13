let titles = ['freeCodeCamp', 'Advent of Code', 'Book Club'];
let descriptions = ["I wanted practice using the map(), filter(), and reduce() functions that were briefly introduced to me in school, so I started working my way through the JavaScript Algorithms and Data Structures Certification offered by freedCodeCamp. It was a great way to review some of the basics that I had already learned and practice some things that I needed to improve on.", "Around the end of November 2023, one of my software engineer friends mentioned Advent of Code as a way to test my puzzle solving abilities and get extra practice coding. Every year, they come out with different Christmas themed puzzles that can be solved using the programming language of your choice. I enjoyed the challenge of parsing certain information from Strings to calculate the 'calibration number' for each puzzle, and I got to use the skills I had been practicing with freeCodeCamp.", "I was invited to join a book club that my friends run as a way to keep themselves accoutable for continuing their education in the software engineering/development field. Before school started Spring 2024, I was able to read 'Good Code, Bad Code' by Tom Long and 'Nonviolent Communication' by Marshall Rosenberg with them, and I plan to hop back in once school doesn't overlap with the times they plan to meet."]

function generateContent(index) {
    let currentElement = document.querySelector('.description-content-wrapper');
    let parentSection = document.querySelector('.description-container');
    
    currentElement.remove();

    let newDiv = document.createElement('div');
    newDiv.setAttribute('class', 'description-content-wrapper');
    newDiv.classList.add('animate-in');
    let newH2 = document.createElement('h2');
    newH2.innerHTML = titles[index];
    let newParagraph = document.createElement('p');
    newParagraph.innerHTML = descriptions[index];

    newDiv.appendChild(newH2);
    newDiv.appendChild(newParagraph);
    parentSection.appendChild(newDiv);

    selectImage(index);
}

function selectImage(index) {
    let images = document.querySelectorAll('.image-text-wrapper img');
    let dots = document.querySelectorAll('.image-text-wrapper div.dot-indicator');
    
    for (x=0; x<images.length; x++) {
        if (x === index) {
            images[x].classList.add('selected');
            dots[x].classList.add('selected');
        } else {
            images[x].classList.remove('selected');
            dots[x].classList.remove('selected');
        }
    }
}