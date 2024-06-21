// Slider code

let currentSlide = 1;
const totalSlides = 5;

function showSlide(slide) {
  document.getElementById(`s${slide}`).checked = true;
}

function nextSlide() {
  currentSlide++;
  if (currentSlide > totalSlides) {
    currentSlide = 1;
  }
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide--;
  if (currentSlide < 1) {
    currentSlide = totalSlides;
  }
  showSlide(currentSlide);
}

document.addEventListener("DOMContentLoaded", function () {
  // Page Active Code
  var currentPage = window.location.pathname.split("/").pop();

  // Select all the nav links
  var navLinks = document.querySelectorAll(".navbar-nav .nav-link");

  // Loop through each nav link
  navLinks.forEach(function (link) {
    // Get the href attribute of the link
    var linkHref = link.getAttribute("href");

    // Compare the link href with the current page URL
    if (linkHref === currentPage) {
      // Add the active class to the link
      link.classList.add("active");
    } else {
      // Remove the active class from the link if it doesn't match
      link.classList.remove("active");
    }
  });

  //   Window Full screen
  const fullscreenToggle = document.getElementById("fullscreen-toggle");

  fullscreenToggle.addEventListener("click", () => {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen().catch((err) => {
        console.log(
          `Error attempting to enable fullscreen mode: ${err.message} (${err.name})`
        );
      });
    } else {
      document.exitFullscreen();
    }
  });
});

$(document).ready(function () {
  // Eye Close Open
  $(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
});

//  ===================  Task Asif work start=========================

function displayTasks() {
  const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
  console.log(tasks);
  const currentDate = new Date();

  console.log(currentDate);
  // console.log(currentDate);
  const activeTasksContainer = document.getElementById("added-tasks");
  if(!activeTasksContainer){
    return ;
  }
  activeTasksContainer.innerHTML = "";
  const completedTasksContainer = document.getElementById("completed-task");
  completedTasksContainer.innerHTML = "";

  tasks.forEach((task) => {
    const taskElement = `<div class="col-md-6 mb-4">
                      <div class="cards bg-white p-4 ">
                        <div class="row">
                          <div class="col-6">
                            <h3 class="tabs-font1">${task.id}</h3>
                            <h5 class="tabs-font2">${task.taskName}</h5>
                          </div>
                          <div
                            class="col-6 d-flex flex-column justify-content-center align-items-end"
                          >
                            <h6 class="tabs-font4">
                              Status : <span class="green-tab">${
                                task.status
                              }</span>
                            </h6>
                            <button class="tabs-btn my-3 completed-btn" onclick="markAsCompleted(${
                              task.id
                            })">Mark as ${
      task.status == "Active" ? "Completed" : "Active"
    }</button>
                          </div>
                          <div class="col-12">
                            <p class="tabs-font3 pt-3">
                            ${task.comment}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
              `;
    if (task.status === "Active") {
      activeTasksContainer.insertAdjacentHTML("beforeend", taskElement);
    } else if (task.status === "Completed") {
      completedTasksContainer.insertAdjacentHTML("beforeend", taskElement);
    }
  });
}

function markAsCompleted(taskId) {
  let tasks = JSON.parse(localStorage.getItem("tasks")) || [];
  tasks = tasks.map((task) => {
    if (task.id === taskId) {
      if (task.status == "Completed") {
        task.status = "Active";
      } else {
        task.status = "Completed";
      }
    }
    return task;
  });
  localStorage.setItem("tasks", JSON.stringify(tasks));
  displayTasks();
}

window.onload = function () {
  displayTasks();
  displayTasksInModal();
  const addTaskBtn = document.getElementById("add-task");
  if(addTaskBtn)
    addTaskBtn.addEventListener("submit", function (event) {
      event.preventDefault();
      const taskName = document.getElementById("taskname").value;
      const comment = document.getElementById("comment").value;
      if (taskName === "" || comment === "") {
        return;
      }
      let tasks = JSON.parse(localStorage.getItem("tasks")) || [];
      const currentDate = new Date();
      const newTask = {
        id: tasks.length + 1,
        taskName: taskName,
        comment: comment,
        status: "Active",
        createdAt: currentDate.toLocaleString(),
      };
      console.log(currentDate);
      tasks.push(newTask);
      localStorage.setItem("tasks", JSON.stringify(tasks));
      displayTasks();
      document.getElementById("add-task").reset();

    });
};

function displayTasksInModal() {
  const tasks = JSON.parse(localStorage.getItem('tasks')) || [];
  const modalBody = $('#task-body');
  modalBody.empty(); 
  tasks.forEach(task => {
      if (task.status === 'Active') {
          const taskElement = `<div class="bg-light py-2 px-3 mb-3 text-dark rounded-10 my-own-tasks" data-task-id="${task.id}" taskName="${task.taskName}" style="cursor:pointer;">
                                   <h5 class="mb-0 pb-0">${task.taskName}</h5>
                               </div>`;
          modalBody.append(taskElement);
      }
  });

  $('.my-own-tasks').on('click', function() {
    const taskId = $(this).data('task-id');
    const taskName = $(this).attr('taskName');
    localStorage.setItem('task_id', taskId);
    localStorage.setItem('task_name', taskName);

    console.log(localStorage.getItem('task_id')+" ye hai wo jis ka mujhy salon se intzar tha ");
    console.log(taskName, taskId);
    $('#selectTask').text(taskName);
    $('#exampleModal').modal('hide');
  });
}

displayTasksInModal();






// =================================tracker ===================================

// last 24 hours data 

// MARK: last 24 hours data {

function displayLast24HoursSessions() {
  const pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
  const hours24Container = document.querySelector('.hours-24');
  if(!hours24Container){
    return ;
  }
  hours24Container.innerHTML = '';
  const now = new Date();
  const twentyFourHoursAgo = new Date(now.getTime() - (24 * 60 * 60 * 1000));
  const last24HoursSessions = pomodoroSessions.filter(session => {
      const sessionStartTime = new Date(session.start_time);
      return sessionStartTime >= twentyFourHoursAgo;
  });
  // Iterate through the sessions from the last 24 hours to create HTML elements
  last24HoursSessions.forEach(session => {
      // Get the task name for the session or set it to 'No Task' if task_id is not present
      const taskName = session.task_id ? `Task Name: ${session.task_name}` : 'No Task';
      // Calculate the duration of the session in seconds
      const sessionDuration = (new Date(session.end_time) - new Date(session.start_time)) / 1000;
      // Convert duration from seconds to HH:mm:ss format
      const formattedDuration = new Date(sessionDuration * 1000).toISOString().substr(11, 8);
      // Create an HTML element to display session details
      const sessionElement = `
          <div class="d-flex align-items-center gap-4 py-4  border border-sm mb-3 p-4">
              <p>${taskName}</p>
              <p>Duration: ${formattedDuration}</p>
              <p>Start Time: ${new Date(session.start_time).toLocaleTimeString()}</p>
              <p>End Time: ${new Date(session.end_time).toLocaleTimeString()}</p>
          </div>
      `;
      hours24Container.insertAdjacentHTML('beforeend', sessionElement);
  });
}
displayLast24HoursSessions();






// last 7 days  data 






function displayLast7DaysSessions() {
  const pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
  const days7Container = document.querySelector('.days-7');
  if(!days7Container){
    return ;
  }
  days7Container.innerHTML = '';
  const now = new Date();
  const sevenDaysAgo = new Date(now.getTime() - (7 * 24 * 60 * 60 * 1000));

  // Filter sessions from the last 7 days based on their start_time
  const last7DaysSessions = pomodoroSessions.filter(session => {
      const sessionStartTime = new Date(session.start_time);
      return sessionStartTime >= sevenDaysAgo;
  });
  // Iterate through the sessions from the last 7 days to create HTML elements
  last7DaysSessions.forEach(session => {
      // Get the task name for the session or set it to 'No Task' if task_id is not present
      const taskName = session.task_id ? `Task Name: ${session.task_name}` : 'No Task';

      // Calculate the duration of the session in seconds
      const sessionDuration = (new Date(session.end_time) - new Date(session.start_time)) / 1000;

      // Convert duration from seconds to HH:mm:ss format
      const formattedDuration = new Date(sessionDuration * 1000).toISOString().substr(11, 8);

      // Create an HTML element to display session details
      const sessionElement = `
          <div class="d-flex align-items-center gap-4 py-4 border border-sm mb-3 p-4">
              <p>${taskName}</p>
              <p>Duration: ${formattedDuration}</p>
              <p>Start Time: ${new Date(session.start_time).toLocaleTimeString()}</p>
              <p>End Time: ${new Date(session.end_time).toLocaleTimeString()}</p>
          </div>
      `;
      days7Container.insertAdjacentHTML('beforeend', sessionElement);
  });
}

displayLast7DaysSessions();



// last 30 days data 





function displayLast30DaysSessions() {
  const pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
  const days30Container = document.querySelector('.days-30');
  if(!days30Container){
    return ;
  }
  days30Container.innerHTML = '';
  const now = new Date();
  const thirtyDaysAgo = new Date(now.getTime() - (30 * 24 * 60 * 60 * 1000));
  // Filter sessions from the last 30 days based on their start_time
  const last30DaysSessions = pomodoroSessions.filter(session => {
      const sessionStartTime = new Date(session.start_time);
      return sessionStartTime >= thirtyDaysAgo;
  });

  // Iterate through the sessions from the last 30 days to create HTML elements
  last30DaysSessions.forEach(session => {
      // Get the task name for the session or set it to 'No Task' if task_id is not present
      const taskName = session.task_id ? `Task Name: ${session.task_name}` : 'No Task';
      // Calculate the duration of the session in seconds
      const sessionDuration = (new Date(session.end_time) - new Date(session.start_time)) / 1000;
      // Convert duration from seconds to HH:mm:ss format
      const formattedDuration = new Date(sessionDuration * 1000).toISOString().substr(11, 8);
      const sessionElement = `
          <div class="d-flex align-items-center gap-4 py-4 border border-sm mb-3 p-4">
              <p>${taskName}</p>
              <p>Duration: ${formattedDuration}</p>
              <p>Start Time: ${new Date(session.start_time).toLocaleTimeString()}</p>
              <p>End Time: ${new Date(session.end_time).toLocaleTimeString()}</p>
          </div>
      `;
      days30Container.insertAdjacentHTML('beforeend', sessionElement);
  });
}
displayLast30DaysSessions();





// by days data 
// MARK: DISPLAY BY DAYS DATA
function displaySessionsByDays() {
  const pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
  const accordionContainer = document.querySelector('#accordionFlushExample');
  if(!accordionContainer){
    return ;
  }
  accordionContainer.innerHTML = ''; // Clear any existing content
  const sessionsByDays = {};

  // Group sessions by date
  pomodoroSessions.forEach(session => {
    const sessionDate = new Date(session.start_time).toDateString();
    if (sessionsByDays.hasOwnProperty(sessionDate)) {
      sessionsByDays[sessionDate].push(session);
    } else {
      sessionsByDays[sessionDate] = [session];
    }
  });

  let stepCounter = 1; 

  // Create accordion items for each date
  for (const date in sessionsByDays) {
    if (sessionsByDays.hasOwnProperty(date)) {
      const totalDuration = sessionsByDays[date].reduce((acc, session) => {
        return acc + (new Date(session.end_time) - new Date(session.start_time)) / 1000;
      }, 0);
      const formattedTotalDuration = new Date(totalDuration * 1000).toISOString().substr(11, 8);

      const accordionItem = document.createElement('div');
      accordionItem.className = 'accordion-item rounded-3 border-0 shadow mb-2';

      const headingId = `flush-heading${stepCounter}`;
      const collapseId = `flush-collapse${stepCounter}`;

      accordionItem.innerHTML = `
        <h2 class="accordion-header rounded">
          <button
            class="accordion-button border-bottom collapsed fw-semibold"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#${collapseId}"
            aria-expanded="false"
            aria-controls="${collapseId}">
            <h2 class="m-0 py-0 py-md-3 accordions-font2 d-flex align-items-center">
              <span class="pe-4 tracker-font2">${date} <span class="tracker-font1">(${formattedTotalDuration})</span></span>
            </h2>
          </button>
        </h2>
        <div id="${collapseId}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            ${sessionsByDays[date].map(session => {
              const taskName = session.task_id ? `Task Name: ${session.task_name}` : 'No Task';
              const sessionDuration = (new Date(session.end_time) - new Date(session.start_time)) / 1000;
              const formattedDuration = new Date(sessionDuration * 1000).toISOString().substr(11, 8);
              return `
                <div class="d-flex justify-content-between align-items-center py-2">
                  <div>
                    <h5>${taskName}</h5>
                    <p class="m-0 p-0">Start Time: ${new Date(session.start_time).toLocaleTimeString()}</p>
                  </div>
                  <div class="d-flex justify-content-center align-items-end flex-column">
                    <img src="assets/images/clock.png" alt="clock">
                    <h6 class="mt-3">${formattedDuration}</h6>
                  </div>
                </div>`;
            }).join('')}
          </div>
        </div>
      `;

      accordionContainer.appendChild(accordionItem);
      stepCounter++;
    }
  }
}

// Call the function to display sessions by days in the accordion
displaySessionsByDays();



//mark: by task data 





//////////////////////////////////////////////////////////////////////
function displaySessionsByTask() {
  const pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
  const accordionContainer = document.querySelector('#accordionFlushExample2');
  if(!accordionContainer){
    return ;
  }
  accordionContainer.innerHTML = ''; // Clear any existing content
  const sessionsByTask = {};

  // Group sessions by task
  pomodoroSessions.forEach(session => {
    const taskName = session.task_id ? session.task_name : 'No Task';
    if (sessionsByTask.hasOwnProperty(taskName)) {
      sessionsByTask[taskName].push(session);
    } else {
      sessionsByTask[taskName] = [session];
    }
  });

  let stepCounter = 1; // Counter for unique IDs

  // Create accordion items for each task
  for (const task in sessionsByTask) {
    if (sessionsByTask.hasOwnProperty(task)) {
      const totalDuration = sessionsByTask[task].reduce((acc, session) => {
        return acc + (new Date(session.end_time) - new Date(session.start_time)) / 1000;
      }, 0);
      const formattedTotalDuration = new Date(totalDuration * 1000).toISOString().substr(11, 8);

      const accordionItem = document.createElement('div');
      accordionItem.className = 'accordion-item rounded-3 border-0 shadow mb-2';

      const headingId = `flush-heading${stepCounter}`;
      const collapseId = `flush-collapse${stepCounter}`;

      accordionItem.innerHTML = `
        <h2 class="accordion-header rounded">
          <button
            class="accordion-button border-bottom collapsed fw-semibold"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#${collapseId}"
            aria-expanded="false"
            aria-controls="${collapseId}">
            <h2 class="m-0 py-0 py-md-3 accordions-font2 d-flex align-items-center">
              <span class="pe-4 tracker-font2">${task} <span class="tracker-font1">(${formattedTotalDuration})</span></span>
            </h2>
          </button>
        </h2>
        <div id="${collapseId}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
          <div class="accordion-body">
            ${sessionsByTask[task].map(session => {
              const sessionDuration = (new Date(session.end_time) - new Date(session.start_time)) / 1000;
              const formattedDuration = new Date(sessionDuration * 1000).toISOString().substr(11, 8);
              return `
                <div class="d-flex justify-content-between align-items-center py-2">
                  <div>
                    <h5>${task}</h5>
                    <p class="m-0 p-0">Start Time: ${new Date(session.start_time).toLocaleTimeString()}</p>
                    <p class="m-0 p-0">End Time: ${new Date(session.end_time).toLocaleTimeString()}</p>
                  </div>
                  <div class="d-flex justify-content-center align-items-end flex-column">
                    <img src="assets/images/clock.png" alt="clock">
                    <h6 class="mt-3">${formattedDuration}</h6>
                  </div>
                </div>`;
            }).join('')}
          </div>
        </div>
      `;

      accordionContainer.appendChild(accordionItem);
      stepCounter++;
    }
  }
}

// Call the function to display sessions by task in the accordion
displaySessionsByTask();




// total pomodoro duratoion 

function calculateUniqueTasksAndDuration() {
  const pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
  const uniqueTasks = new Set();
  let totalDurationInSeconds = 0;
  // Iterate through pomodoroSessions to calculate unique tasks and total duration
  pomodoroSessions.forEach(session => {
      uniqueTasks.add(session.task_id); // Add task_id to the Set to get unique tasks
      const sessionDuration = (new Date(session.end_time) - new Date(session.start_time)) / 1000;
      totalDurationInSeconds += sessionDuration;
  });

  const totalDurationFormatted = new Date(totalDurationInSeconds * 1000).toISOString().substr(11, 8);
  // Update the DOM with the calculated values
  const activePomoExists = document.querySelector('.activePomoTask');
  if(activePomoExists){
    activePomoExists.textContent = `${uniqueTasks.size} Task`;
  }
  const activePomoDurationExists = document.querySelector('.activePomoDuration');
  if(activePomoDurationExists){
    activePomoDurationExists.textContent = totalDurationFormatted;
  }
}

calculateUniqueTasksAndDuration();



// MARK: }
