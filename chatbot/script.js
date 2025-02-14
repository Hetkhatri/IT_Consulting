const messageIn = document.querySelector(".user-question");
const chatbody = document.querySelector(".chatbody");
const submit_button = document.querySelector("#submit");
const filebtn = document.querySelector("#file-input");

const userData = {
  message: null,
  file: {
    data: null,
    mime_type: null,
  },
};

const API_KEY = "AIzaSyDGFH9vn9fxB6WZfmGm2Rddejvwq8Vx-IE";
const API_URL = `https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${API_KEY}`;

const createMessageElement = (content, classes) => {
  const div = document.createElement("div");
  div.classList.add(classes);
  div.innerHTML = content;
  return div;
};

const getResponse = async (incomingMessage) => {
  const message_div = incomingMessage.querySelector(".message-text");
  const thinkingDots = incomingMessage.querySelector(".thinking");

  if (userData.message.toLowerCase().includes("who created you")) {
    message_div.innerText = "I was created by Dhairya Makwana! 🎉";
    if (thinkingDots) thinkingDots.remove();
    return;
  }

  if (userData.message.toLowerCase().includes("who is your owener")) {
    message_div.innerText = "my owener is Dhairya Makwana!";
    if (thinkingDots) thinkingDots.remove();
    return;
  }

  if (userData.message.toLowerCase().includes("when you are created")) {
    message_div.innerText =
      "I was created on 9 February 2025 by Dhairya Makwana! ";
    if (thinkingDots) thinkingDots.remove();
    return;
  }

  try {
    const request = {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        contents: [
          {
            parts: [
              { text: userData.message },
              userData.file.data ? [{ inline_data: userData.file }] : [],
            ],
          },
        ],
      }),
    };

    const response = await fetch(API_URL, request);
    const data = await response.json();

    if (!response.ok) throw new Error(data.error.message);

    const api_answer = data.candidates[0].content.parts[0].text.trim();
    message_div.innerText = api_answer;

    if (thinkingDots) {
      thinkingDots.remove();
    }
  } catch (error) {
    message_div.innerText = "Error: Unable to fetch response.";
    console.error(error);

    if (thinkingDots) {
      thinkingDots.remove();
    }
  }
};

const handleUserMessage = (e) => {
  e.preventDefault();
  userData.message = messageIn.value.trim();
  if (!userData.message) return;

  messageIn.value = "";

  const userMessageContent = `${
    userData.file.data
      ? `<img src = "data:${userData.file.mime_type};base64,${userData.file.data}" class="attachfile"/>`
      : ""
  }
    <div class="message-text">${userData.message}</div>`;

  const outMessage = createMessageElement(userMessageContent, "user-message");
  chatbody.appendChild(outMessage);
  chatbody.scrollTo({ top: chatbody.scrollHeight, behavior: "smooth" });

  userData.file = { data: null, mime_type: null };

  chatbody.scrollTop = chatbody.scrollHeight;

  setTimeout(() => {
    const botMessageContent = `
            <div class="message">
                <img src="chatboat.png">
                <div class="message-text"></div>
                <div class="thinking">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>`;

    const incomingMessage = createMessageElement(botMessageContent, "message");
    chatbody.appendChild(incomingMessage);

    getResponse(incomingMessage);
  }, 400);
};

messageIn.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey) {
    e.preventDefault();
    handleUserMessage(e);
  }
});

filebtn.addEventListener("change", () => {
  const file = filebtn.files[0];

  if (!file) return;

  const read = new FileReader();

  read.onload = (e) => {
    const base64String = e.target.result.split(",")[1];
    userData.file = {
      data: base64String,
      mime_type: file.type,
    };

    filebtn.value = "";
    console.log(userData);
  };
  read.readAsDataURL(file);
});

submit_button.addEventListener("click", handleUserMessage);

document.querySelector("#file-upload").addEventListener("click", () => {
  filebtn.click();
});
