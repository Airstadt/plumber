document.getElementById("simpleForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value
    };

    fetch("http://localhost:3000/save", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(formData)
    });
});


const express = require("express");
const fs = require("fs");
const app = express();

app.use(express.json());

app.post("/save", (req, res) => {
    fs.appendFile("data.txt", JSON.stringify(req.body) + "\n", (err) => {
        if (err) res.status(500).send("Error saving data");
        else res.send("Data saved successfully!");
    });
});

app.listen(3000, () => console.log("Server running on http://localhost:3000"));

