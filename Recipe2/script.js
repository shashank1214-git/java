const recipes = [
    {
        name: "Pancakes",
        ingredients: ["flour", "milk", "eggs", "sugar", "butter"],
        instructions: "Mix all ingredients and cook on a skillet."
    },
    {
        name: "Scrambled Eggs",
        ingredients: ["eggs", "butter", "salt", "pepper"],
        instructions: "Whisk eggs, season, and cook in butter."
    },
    {
        name: "Fruit Salad",
        ingredients: ["apple", "banana", "orange", "grapes"],
        instructions: "Chop all fruits and mix together."
    },
    {
        name: "Tomato soup",
        ingredients: ["tomato", "water", "pepper", "salt", "butter"],
        instructions: "1.Boil tomatoes.\n2.Grind them to make puree.\n3.Add butter in a pan. And add the puree in it with salt and pepper.\n 4.add water and let it boil."
    },
    {
        name: "French Fries",
        ingredients: ["Potato", "oil", "salt", "peri-peri (optional)"],
        instructions: "1.Chop potatoes.\n2. Boil them and then keep them in freezer.\n 3.After 2 hrs fry them in oil.\n add peri-peri if needed"
    }
];

function findRecipe() {
    const input = document.getElementById('ingredients-input').value;
    const userIngredients = input.split(',').map(ingredient => ingredient.trim().toLowerCase());

    const matchedRecipes = recipes.filter(recipe =>
         recipe.ingredients.some(ingredient => userIngredients.includes(ingredient))
        //recipe.ingredients.every(ingredient => userIngredients.includes(ingredient))
    );

    const output = document.getElementById('recipe-output');
    output.innerHTML = '';

    if (matchedRecipes.length > 0) {
        matchedRecipes.forEach(recipe => {
            const recipeDiv = document.createElement('div');
            recipeDiv.classList.add('recipe');
            recipeDiv.innerHTML = `
                <h3>${recipe.name}</h3>
                <p><strong>Ingredients:</strong> ${recipe.ingredients.join(', ')}</p>
                <p><strong>Instructions:</strong> ${recipe.instructions}</p>
            `;
            output.appendChild(recipeDiv);
        });
    } else {
        output.innerHTML = '<p>No recipes found with the given ingredients.</p>';
    }
}
document.getElementById('find-recipe').addEventListener('click', findRecipe);


  
