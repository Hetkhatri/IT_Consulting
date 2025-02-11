const projects = [
    { id: 1, title: "E-commerce Website", srs: "Detailed requirements for the e-commerce website..." },
    { id: 2, title: "Mobile App Development", srs: "Specifications for mobile app development..." },
    { id: 3, title: "Machine Learning Model", srs: "Requirements for a machine learning model..." }
];

const projectsList = document.getElementById('projects-list');
const homePage = document.getElementById('home-page');
const projectsPage = document.getElementById('projects-page');
const contactPage = document.getElementById('contact-page');

function renderProjects() {
    projects.forEach(project => {
        const projectDiv = document.createElement('div');
        projectDiv.classList.add('project');

        projectDiv.innerHTML = `
            <h3>${project.title}</h3>
            <div class="buttons">
                <button class="view-srs" onclick="viewSRS(${project.id})">View SRS</button>
                <button class="accept-project" onclick="acceptProject(${project.id})">Accept Project</button>
            </div>
        `;

        projectsList.appendChild(projectDiv);
    });
}

function viewSRS(projectId) {
    const project = projects.find(p => p.id === projectId);
    if (project) {
        alert(`SRS for ${project.title}:

${project.srs}`);
    }
}

function acceptProject(projectId) {
    const project = projects.find(p => p.id === projectId);
    if (project) {
        alert(`You have accepted the project: ${project.title}`);

        // Optionally remove the project from the list
        projectsList.innerHTML = '';
        renderProjects(projects.filter(p => p.id !== projectId));
    }
}

function showHomePage() {
    homePage.style.display = 'block';
    projectsPage.style.display = 'none';
    contactPage.style.display = 'none';
}

function showProjectsPage() {
    homePage.style.display = 'none';
    projectsPage.style.display = 'block';
    contactPage.style.display = 'none';
}

function showContactPage() {
    homePage.style.display = 'none';
    projectsPage.style.display = 'none';
    contactPage.style.display = 'block';
}

function submitContactForm(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    alert(`Thank you, ${name}! Your message has been received.`);

    // Clear form
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';
}

renderProjects();