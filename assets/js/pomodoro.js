// let timerInterval;
// let pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
// let breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
// let sessionCount = parseInt(localStorage.getItem('sessionCount')) || 1;
// let currentSession = parseInt(localStorage.getItem('currentSession')) || 1;
// let isBreak = localStorage.getItem('isBreak') === 'true';
// let isTimerRunning = localStorage.getItem('isTimerRunning') === 'true';

// document.getElementById('pomodoroForm').addEventListener('submit', function(event) {
//     event.preventDefault();
//     const pomodoroInput = document.querySelector('#pomodoroInput').value;
//     const breakInput = document.querySelector('#breakInput').value;
//     const sessionInput = document.querySelector('#sessionInput').value;
//     if (pomodoroInput) {
//         const parsedPomodoroLength = parseInt(pomodoroInput);
//         if (!isNaN(parsedPomodoroLength) && parsedPomodoroLength > 0) {
//             pomodoroLength = parsedPomodoroLength * 60;
//             localStorage.setItem('pomodoroLength', pomodoroLength);
//         }
//     }
//     if (breakInput) {
//         const parsedBreakLength = parseInt(breakInput);
//         if (!isNaN(parsedBreakLength) && parsedBreakLength > 0) {
//             breakLength = parsedBreakLength * 60;
//             localStorage.setItem('breakLength', breakLength);
//         } else {
//             breakLength = 5 * 60;
//             localStorage.setItem('breakLength', breakLength);
//         }
//     }
//     if (sessionInput) {
//         const parsedSessionCount = parseInt(sessionInput);
//         if (!isNaN(parsedSessionCount) && parsedSessionCount > 0) {
//             sessionCount = parsedSessionCount;
//             localStorage.setItem('sessionCount', sessionCount);
//         } else {
//             sessionCount = 1;
//             localStorage.setItem('sessionCount', sessionCount);
//         }
//     }
//     currentSession = 1;
//     localStorage.setItem('currentSession', currentSession);
//     isBreak = false;
//     localStorage.setItem('isBreak', isBreak);
//     isTimerRunning = false;
//     localStorage.setItem('isTimerRunning', isTimerRunning);
//     updateTimerDisplay();
// });
// function startTimer() {
//     if (!isTimerRunning) {
//         isTimerRunning = true;
//         localStorage.setItem('isTimerRunning', isTimerRunning);
//         timerInterval = setInterval(updateTimer, 1000);
//     }
//     document.getElementById('startBtn').style.display = 'none';
//     document.getElementById('pauseBtn').style.display = 'inline-block';
//     document.getElementById('resumeBtn').style.display = 'none';
//     document.getElementById('resetBtn').style.display = 'inline-block';
//     document.getElementById('startIcon').style.display = 'none';
//     document.getElementById('resumeIcon').style.display = 'inline-block';
// }
// function pauseTimer() {
//     clearInterval(timerInterval);
//     isTimerRunning = false;
//     localStorage.setItem('isTimerRunning', isTimerRunning);
//     document.getElementById('pauseBtn').style.display = 'none';
//     document.getElementById('resumeBtn').style.display = 'inline-block';
//     document.getElementById('startIcon').style.display = 'inline-block';
//     document.getElementById('resumeIcon').style.display = 'none';

// }
// function resumeTimer() {
//     if (!isTimerRunning) {
//         isTimerRunning = true;
//         localStorage.setItem('isTimerRunning', isTimerRunning);
//         timerInterval = setInterval(updateTimer, 1000);
//     }
//     document.getElementById('resumeBtn').style.display = 'none';
//     document.getElementById('pauseBtn').style.display = 'inline-block';
//     document.getElementById('startIcon').style.display = 'none';
//     document.getElementById('resumeIcon').style.display = 'inline-block';
// }
// function resetTimer() {
//     clearInterval(timerInterval);
//     pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
//     breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
//     sessionCount = parseInt(localStorage.getItem('sessionCount')) || 1;
//     currentSession = 1;
//     isBreak = false;
//     isTimerRunning = false;
//     localStorage.removeItem('currentSession');
//     localStorage.removeItem('isBreak');
//     localStorage.removeItem('isTimerRunning');
//     localStorage.removeItem('pomodoroLength');
//     localStorage.removeItem('breakLength');
//     localStorage.removeItem('sessionCount');
//     pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
//     breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
//     sessionCount = parseInt(localStorage.getItem('sessionCount')) || 1;
//     updateTimerDisplay();
//     document.getElementById('startBtn').style.display = 'inline-block';
//     document.getElementById('pauseBtn').style.display = 'none';
//     document.getElementById('resumeBtn').style.display = 'none';
//     document.getElementById('resetBtn').style.display = 'inline-block';
//     document.getElementById('startIcon').style.display = 'inline-block';
//     document.getElementById('resumeIcon').style.display = 'none';

// }
// function updateTimer() {
//     if (!isBreak && pomodoroLength > 0) {
//         pomodoroLength--;
//         localStorage.setItem('pomodoroLength', pomodoroLength);
//         updateTimerDisplay();
//     } else if (!isBreak) {
//         playAudio();
//         startBreak();
//     } else if (isBreak && breakLength > 0) {
//         breakLength--;
//         localStorage.setItem('breakLength', breakLength);
//         updateTimerDisplay();
//     } else {
//         playAudio();
//         if (currentSession < sessionCount) {
//             startPomodoro();
//         } else {
//             clearInterval(timerInterval);
//             resetTimer();
//         }
//     }
// }
// function startPomodoro() {
//     clearInterval(timerInterval);
//     isBreak = false;
//     localStorage.setItem('isBreak', isBreak);
//     currentSession++;
//     localStorage.setItem('currentSession', currentSession);
//     pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
//     timerInterval = setInterval(updateTimer, 1000);
//     document.getElementById('theme-desc').innerHTML = '';
//     updateTimerDisplay();
// }

// function startBreak() {
//     clearInterval(timerInterval);
//     isBreak = true;
//     localStorage.setItem('isBreak', isBreak);
//     breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
//     timerInterval = setInterval(updateTimer, 1000);
//     document.getElementById('theme-desc').innerHTML = 'Break time';
// }

// function updateTimerDisplay() {
//     const time = isBreak ? breakLength : pomodoroLength;
//     const minutes = Math.floor(time / 60);
//     const seconds = time % 60;
//     document.getElementById('timer').innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
// }

//     function searchFromUrl() {
//         console.log("code yehan tak aa ra h ");
//         const urlParams = new URLSearchParams(window.location.search);
//         const paramPomodoroLength = urlParams.get('timerLength');
//         const paramBreakLength = urlParams.get('breakLength');
//     console.log(paramPomodoroLength);
//         if (paramPomodoroLength) {
//             const parsedPomodoroLength = parseInt(paramPomodoroLength);
//             if (!isNaN(parsedPomodoroLength) && parsedPomodoroLength > 0) {
//                 pomodoroLength = parsedPomodoroLength * 60;
//                 localStorage.setItem('pomodoroLength', pomodoroLength);
//             }
//     console.log(paramPomodoroLength);
// }
//         if (paramBreakLength) {
//             const parsedBreakLength = parseInt(paramBreakLength);
//             if (!isNaN(parsedBreakLength) && parsedBreakLength > 0) {
//                 breakLength = parsedBreakLength * 60;
//             }
//     console.log(paramPomodoroLength);
// }


// }
// updateTimerDisplay();

// function playAudio() {
//     const audio = document.getElementById('endAudio');
//     audio.play();
// }
// window.addEventListener('load', () => {
//     if (localStorage.getItem('isTimerRunning') === 'true') {
//         if (localStorage.getItem('isBreak') === 'true') {
//             startBreak();
//         } else {
//             startPomodoro();
//         }
//     } else {
//         updateTimerDisplay();
//     }
// });






// searchFromUrl();





let timerInterval;
let pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
let breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
let sessionCount = parseInt(localStorage.getItem('sessionCount')) || 1;
let currentSession = parseInt(localStorage.getItem('currentSession')) || 1;
let isBreak = localStorage.getItem('isBreak') === 'true';
let isTimerRunning = localStorage.getItem('isTimerRunning') === 'true';
let taskId = null;
console.log(localStorage.getItem('task_id'));
let pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];

document.getElementById('pomodoroForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const pomodoroInput = document.querySelector('#pomodoroInput').value;
    const breakInput = document.querySelector('#breakInput').value;
    const sessionInput = document.querySelector('#sessionInput').value;
    if (pomodoroInput) {
        const parsedPomodoroLength = parseInt(pomodoroInput);
        if (!isNaN(parsedPomodoroLength) && parsedPomodoroLength > 0) {
            pomodoroLength = parsedPomodoroLength * 60;
            localStorage.setItem('pomodoroLength', pomodoroLength);
        }
    }
    if (breakInput) {
        const parsedBreakLength = parseInt(breakInput);
        if (!isNaN(parsedBreakLength) && parsedBreakLength > 0) {
            breakLength = parsedBreakLength * 60;
            localStorage.setItem('breakLength', breakLength);
        } else {
            breakLength = 5 * 60;
            localStorage.setItem('breakLength', breakLength);
        }
    }
    if (sessionInput) {
        const parsedSessionCount = parseInt(sessionInput);
        if (!isNaN(parsedSessionCount) && parsedSessionCount > 0) {
            sessionCount = parsedSessionCount;
            localStorage.setItem('sessionCount', sessionCount);
        } else {
            sessionCount = 1;
            localStorage.setItem('sessionCount', sessionCount);
        }
    }
    currentSession = 1;
    localStorage.setItem('currentSession', currentSession);
    isBreak = false;
    localStorage.setItem('isBreak', isBreak);
    isTimerRunning = false;
    localStorage.setItem('isTimerRunning', isTimerRunning);
    updateTimerDisplay();
});

function startTimer() {
    if (!isTimerRunning) {
        isTimerRunning = true;
        localStorage.setItem('isTimerRunning', isTimerRunning);
        var taskId = localStorage.getItem('task_id');
        var taskName = localStorage.getItem('task_name');
        const sessionStart = new Date();
        const newSession = {
            session_id: pomodoroSessions.length + 1,
            user_id: 'Not set',
            start_time: sessionStart.toISOString(),
            end_time: null,
            status: 'Active',
            task_id: taskId,
            task_name: taskName
        };

        pomodoroSessions.push(newSession);
        localStorage.setItem('pomodoroSessions', JSON.stringify(pomodoroSessions));
        timerInterval = setInterval(updateTimer, 1000);
        console.log(JSON.stringify(pomodoroSessions, null, 2));
        const userId = newSession.user_id;
        const pomosessionid = newSession.session_id;
        const startTime = newSession.start_time;
        const status = newSession.status;
        const task_name = newSession.task_name;
        $.ajax({
            url: 'start_pomodoro.php',
            type: 'POST',
            data: {
                userid: userId,
                pomosessionid: pomosessionid,
                start_time: startTime,
                status: status,
                task_name:task_name
            },
            success: function (response) {
                console.log(response);
                if (response.status === 'success') {
                  
                } else {
                  
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });

    }
    document.getElementById('startBtn').style.display = 'none';
    document.getElementById('pauseBtn').style.display = 'inline-block';
    document.getElementById('resumeBtn').style.display = 'none';
    document.getElementById('resetBtn').style.display = 'inline-block';
    document.getElementById('startIcon').style.display = 'none';
    document.getElementById('resumeIcon').style.display = 'inline-block';


}

function pauseTimer() {
    clearInterval(timerInterval);
    isTimerRunning = false;
    localStorage.setItem('isTimerRunning', isTimerRunning);
    document.getElementById('pauseBtn').style.display = 'none';
    document.getElementById('resumeBtn').style.display = 'inline-block';
    document.getElementById('startIcon').style.display = 'inline-block';
    document.getElementById('resumeIcon').style.display = 'none';
    let pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
    let currentSession = pomodoroSessions.find(session => session.status === 'Active'); // Get the active session

    if (currentSession) {
        const pauseTime = new Date().toISOString();
        currentSession.status = 'Paused';
        currentSession.pause_time = pauseTime;
        $.ajax({
            url: 'pause_pomodoro.php',
            type: 'POST',
            data: {
                session_id: currentSession.session_id,
                user_id: currentSession.user_id,
                pause_time: pauseTime,
                status: "Paused",
                task_name:currentSession.task_name

            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                } else {
                    console.log("error:"+res.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });


}
}

function resumeTimer() {
    if (!isTimerRunning) {
        isTimerRunning = true;
        localStorage.setItem('isTimerRunning', isTimerRunning);
        timerInterval = setInterval(updateTimer, 1000);

        let pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
        let currentSession = pomodoroSessions.find(session => session.status === 'Active'); // Get the active session
    
        if (currentSession) {
            const resume_time = new Date().toISOString();
            currentSession.resume_time = resume_time;
            $.ajax({
                url: 'resume_pomodoro.php',
                type: 'POST',
                data: {
                    session_id: currentSession.session_id,
                    user_id: currentSession.user_id,
                    resume_time: resume_time,
                    status: "Ongoing",
                    task_name:currentSession.task_name

                },
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                    } else {
                        log('Error: ' + res.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
    }
    document.getElementById('resumeBtn').style.display = 'none';
    document.getElementById('pauseBtn').style.display = 'inline-block';
    document.getElementById('startIcon').style.display = 'none';
    document.getElementById('resumeIcon').style.display = 'inline-block';
}
}
function resetTimer() {

    let pomodoroSessions = JSON.parse(localStorage.getItem('pomodoroSessions')) || [];
    let currentSession = pomodoroSessions.find(session => session.status === 'Active'); // Get the active session

    if (currentSession) {
        const reset_time = new Date().toISOString();
        currentSession.pause_time = reset_time;
        
        $.ajax({
            url: 'reset_pomodoro.php',
            type: 'POST',
            data: {
                session_id: currentSession.session_id,
                user_id: currentSession.user_id,
                reset_time: reset_time,
                status: "Completed",
                task_name:currentSession.task_name

            },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                } else {
                    console.log("error:"+res.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });

    clearInterval(timerInterval);
    pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
    breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
    sessionCount = parseInt(localStorage.getItem('sessionCount')) || 1;
    currentSession = 1;
    isBreak = false;
    isTimerRunning = false;
    localStorage.removeItem('currentSession');
    localStorage.removeItem('isBreak');
    localStorage.removeItem('isTimerRunning');
    localStorage.removeItem('pomodoroLength');
    localStorage.removeItem('breakLength');
    localStorage.removeItem('sessionCount');
    pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
    breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
    sessionCount = parseInt(localStorage.getItem('sessionCount')) || 1;
    updateTimerDisplay();
    document.getElementById('startBtn').style.display = 'inline-block';
    document.getElementById('pauseBtn').style.display = 'none';
    document.getElementById('resumeBtn').style.display = 'none';
    document.getElementById('resetBtn').style.display = 'inline-block';
    document.getElementById('startIcon').style.display = 'inline-block';
    document.getElementById('resumeIcon').style.display = 'none';
    endCurrentSession();
    
        localStorage.removeItem('task_id');
        localStorage.removeItem('task_name');
    
}
}


function updateTimer() {
    if (!isBreak && pomodoroLength > 0) {
        pomodoroLength--;
        localStorage.setItem('pomodoroLength', pomodoroLength);
        updateTimerDisplay();
    } else if (!isBreak) {
        playAudio();
        endCurrentSession();
        startBreak();
    } else if (isBreak && breakLength > 0) {
        breakLength--;
        localStorage.setItem('breakLength', breakLength);
        updateTimerDisplay();
    } else {
        playAudio();
        if (currentSession < sessionCount) {
            startPomodoro();
        } else {
            endCurrentSession();
            clearInterval(timerInterval);
            resetTimer();
        }
    }
}

function endCurrentSession() {
    const sessionEnd = new Date();
    pomodoroSessions = pomodoroSessions.map(session => {
        if (session.status === 'Active') {
            session.end_time = sessionEnd.toISOString();
            session.status = 'completed';
        }
        return session;
    });
    localStorage.setItem('pomodoroSessions', JSON.stringify(pomodoroSessions));
}

function startPomodoro() {
    clearInterval(timerInterval);
    isBreak = false;
    localStorage.setItem('isBreak', isBreak);
    currentSession++;
    localStorage.setItem('currentSession', currentSession);
    pomodoroLength = parseInt(localStorage.getItem('pomodoroLength')) || 25 * 60;
    timerInterval = setInterval(updateTimer, 1000);
    document.getElementById('theme-desc').innerHTML = '';
    updateTimerDisplay();
}

function startBreak() {
    clearInterval(timerInterval);
    isBreak = true;
    localStorage.setItem('isBreak', isBreak);
    breakLength = parseInt(localStorage.getItem('breakLength')) || 5 * 60;
    timerInterval = setInterval(updateTimer, 1000);
    document.getElementById('theme-desc').innerHTML = 'Break time';
}

function updateTimerDisplay() {
    const time = isBreak ? breakLength : pomodoroLength;
    const minutes = Math.floor(time / 60);
    const seconds = time % 60;
    document.getElementById('timer').innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

function searchFromUrl() {
    console.log("code yehan tak aa ra h ");
    const urlParams = new URLSearchParams(window.location.search);
    const paramPomodoroLength = urlParams.get('timerLength');
    const paramBreakLength = urlParams.get('breakLength');
    console.log(paramPomodoroLength);
    if (paramPomodoroLength) {
        const parsedPomodoroLength = parseInt(paramPomodoroLength);
        if (!isNaN(parsedPomodoroLength) && parsedPomodoroLength > 0) {
            pomodoroLength = parsedPomodoroLength * 60;
            localStorage.setItem('pomodoroLength', pomodoroLength);
        }
        console.log(paramPomodoroLength);
    }
    if (paramBreakLength) {
        const parsedBreakLength = parseInt(paramBreakLength);
        if (!isNaN(parsedBreakLength) && parsedBreakLength > 0) {
            breakLength = parsedBreakLength * 60;
            localStorage.setItem('breakLength', breakLength);
        }
        console.log(paramBreakLength);
    }
}
updateTimerDisplay();

function playAudio() {
    const audio = document.getElementById('endAudio');
    audio.play();
}

window.addEventListener('load', () => {
    console.log(JSON.stringify(pomodoroSessions, null, 2));

    if (localStorage.getItem('isTimerRunning') === 'true') {
        if (localStorage.getItem('isBreak') === 'true') {
            startBreak();
        } else {
            startPomodoro();
        }
    } else {
        updateTimerDisplay();
    }
});

searchFromUrl();



