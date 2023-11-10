// JavaScript for quiz logic
const questions = [
    {
        question: "What is the capital of France?",
        options: ["Madrid", "Rome", "Paris", "Berlin"],
        answer: "Paris"
    },
    {
        question: "What is 2 + 2?",
        options: ["3", "4", "5", "6"],
        answer: "4"
    },
    {
        question: "What is the capital of France?",
        options: ["Paris", "London", "Berlin", "Rome"],
        answer: "Paris"
      },
      {
        question: "What is the largest ocean in the world?",
        options: ["Pacific Ocean", "Atlantic Ocean", "Indian Ocean", "Arctic Ocean"],
        answer: "Pacific Ocean"
      },
      {
        question: "What is the name of the tallest mountain in the world?",
        options: ["Mount Everest", "K2", "Kangchenjunga", "Lhotse"],
        answer: "Mount Everest"
      },
      {
        question: "What is the chemical symbol for water?",
        options: ["H2O", "CO2", "O2", "N2"],
        answer: "H2O"
      },
      {
        question: "What is the name of the largest planet in the solar system?",
        options: ["Jupiter", "Saturn", "Uranus", "Neptune"],
        answer: "Jupiter"
      },
      {
        question: "What is the name of the longest river in the world?",
        options: ["Nile River", "Amazon River", "Yangtze River", "Mississippi-Missouri River System"],
        answer: "Nile River"
      },
      {
        question: "What is the name of the smallest country in the world?",
        options: ["Vatican City", "Monaco", "Nauru", "Tuvalu"],
        answer: "Vatican City"
      },
      {
        question: "What is the name of the largest desert in the world?",
        options: ["Sahara Desert", "Arctic Desert", "Antarctic Desert", "Gobi Desert"],
        answer: "Sahara Desert"
      },
      {
        question: "What is the name of the largest rainforest in the world?",
        options: ["Amazon Rainforest", "Congo Rainforest", "Southeast Asian Rainforest", "New Guinea Rainforest"],
        answer: "Amazon Rainforest"
      },
      {
        question: "What is the name of the tallest mammal in the world?",
        options: ["Giraffe", "Elephant", "Blue Whale", "Sperm Whale"],
        answer: "Giraffe"
      },
      {
        question: "What is the name of the fastest land animal in the world?",
        options: ["Cheetah", "Lion", "Tiger", "Jaguar"],
        answer: "Cheetah"
      },
      {
        question: "What is the name of the largest bird in the world?",
        options: ["Ostrich", "Condor", "Albatross", "Emu"],
        answer: "Ostrich"
      },
      {
        question: "What is the name of the largest fish in the world?",
        options: ["Whale Shark", "Ocean Sunfish", "Giant Manta Ray", "Beluga Whale"],
        answer: "Whale Shark"
      },
      {
        question: "What is the name of the largest insect in the world?",
        options: ["Queen Alexandra's Birdwing", "Titan Beetle", "Giant Weta", "Goliath Birdeater"],
        answer: "Queen Alexandra's Birdwing"
      },
      {
        question: "What is the name of the largest flower in the world?",
        options: ["Rafflesia arnoldii", "Giant Corpse Flower", "Titan Arum", "Amorphophallus titanum"],
        answer: "Rafflesia arnoldii"
      },
      {
        question: "What is the name of the largest tree in the world?",
        options: ["General Sherman", "Hyperion", "Methuselah", "Old Tjikko"],
        answer: "General Sherman"
      },
      {
        question: "What is the name of the largest mountain range in the world?",
        options: "Himalayas",
    }
];

let currentQuestionIndex = 0;
let score = 0;

const questionElement = document.getElementById("question");
const optionsElement = document.getElementById("options");
const nextButton = document.getElementById("next-button");
const scoreElement = document.getElementById("score");

function showQuestion(index) {
    const question = questions[index];
    questionElement.textContent = question.question;
    optionsElement.innerHTML = "";

    question.options.forEach((option) => {
        const optionButton = document.createElement("button");
        optionButton.textContent = option;
        optionButton.classList.add("option");
        optionButton.addEventListener("click", () => checkAnswer(option));
        optionsElement.appendChild(optionButton);
    });
}

function checkAnswer(selectedOption) {
    const currentQuestion = questions[currentQuestionIndex];
    if (selectedOption === currentQuestion.answer) {
        score++;
    }

    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion(currentQuestionIndex);
    } else {
        endQuiz();
    }
}

function endQuiz() {
    questionElement.textContent = "Quiz completed!";
    optionsElement.innerHTML = "";
    nextButton.style.display = "none";
    scoreElement.textContent = `Your Score: ${score}/${questions.length}`;
}

showQuestion(currentQuestionIndex);

nextButton.addEventListener("click", () => {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion(currentQuestionIndex);
    } else {
        endQuiz();
    }
});
