export const getUsers = async () => {
  const response = await fetch("http://localhost:8000/users.php");
  return await response.json();
};

export const populateRoot = (users) => {
  const root = document.getElementById("root");

  users.forEach((user) => {
    const userDiv = document.createElement("div");
    userDiv.innerText = user.name;
    root.appendChild(userDiv);
  });
};
