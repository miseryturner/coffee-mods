// ws connect
socket = new WebSocket("ws://localhost:1245");

socket.onopen = function() {
	// console.log("Соединение установлено.");
	$('.btn-bridge').css({
		'display': 'block'
	})
	$('.btn-bridge.btn-bridge-fake').css({
		'display': 'none'
	})
};

socket.onclose = function(event) {
	if (event.wasClean) {
		// console.log('Соединение закрыто чисто');
	} else {
		// console.log('Обрыв соединения'); // например, "убит" процесс сервера
		$('.btn-bridge').css({
			'display': 'none'
		})
		$('.btn-bridge.btn-bridge-fake').css({
			'display': 'block'
		})
	}
};

socket.onmessage = function(event) {
	// console.log("Получены данные " + event.data);
	let loadObj = JSON.parse(event.data); 
	$(`[name = ${loadObj.name}]`).find('.loadbar').css({'width': +loadObj.percentage+'%'})
	// loadObj.percentage
	// loadObj.name
};

socket.onerror = function(error) {
	// console.log("Ошибка " + error.message);
	$('.btn-bridge').css({
		'display': 'none'
	})
	$('.btn-bridge.btn-bridge-fake').css({
		'display': 'none'
	})
	openPopupFirst();
};

const openPopupFirst = () => {
	setTimeout(() => {
		// console.log('open');
	}, 3000)
}

var app = new Vue({
	el: '#app',
	data: {
		searchData: '',
		closeSearch: false,
		downloadButtonContent: `Скачать мод <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="15" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>`,
		downloadButtonContentForDetail: `Скачать мод <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="15" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>`,
		downloadButtonDisabled: false,
		notSavedModsMessage: false,
		authPage: true,
		regPage: false,
		authLogin: '',
		authPass: '',
		errorAuth: '',
		socket: {}
    },
    methods: {
		openPopup() {
			console.log('test');
			$('.background-popup').css({
				'display': 'flex'
			})
		},
		downloadBrige(link, code, extension, section_id, name) {
			ym(90056738,'reachGoal','save_mod');
			const obj = {
				'download': 'https://coffee-mods.ru'+link,
				'folder_name': code,
				'extension': extension,
				'section_id': section_id,
				'name': name
			} 
			socket.send(JSON.stringify(obj))
		},
		closePopup() {
			console.log('close');
			$('.background-popup').css({
				'display': 'none'
			})
		},
		deleteSavedMod(id) {
			const form = new FormData();
			form.append("DELETE_ID", id);
			fetch('/ajax/saved.php', {method: 'post', body: form})
				.then(response => response.json())
				.then(response => {
					// console.log(response);
				})
				.catch(err => console.log(err))
		},
		removeSavedMod(id, event) {
			const form = new FormData();
			form.append("DELETE_ID", id);
			fetch('/ajax/saved.php', {method: 'post', body: form})
				.then(response => response.json())
				.then(response => {
					document.querySelector('.saved-package[data-id="'+id+'"]').remove()
					if(document.getElementsByClassName('saved-package').length == 0) {
						document.getElementsByClassName('error_saved')[0].style.display = 'block'
					}
				})
		},
		openAuth() {
			this.regPage = false
			this.authPage = true
			if(document.getElementById('auth-popup').classList.contains('show')) {
				document.getElementById('auth-popup').classList.remove('show')
				document.getElementById('auth-popup').classList.add('dont-show')
			} else {
				document.getElementById('auth-popup').classList.add('show')
				document.getElementById('auth-popup').classList.remove('dont-show')
			}
			if(document.getElementsByClassName('background-popup')[0].classList.contains('show')) {
				document.getElementsByClassName('background-popup')[0].classList.remove('show')
			} else {
				document.getElementsByClassName('background-popup')[0].classList.add('show')
			}
		},
		closeAuthPopup() {
			this.regPage = false
			this.authPage = true
			document.getElementById('auth-popup').classList.remove('show')
			document.getElementById('auth-popup').classList.add('dont-show')
			document.getElementsByClassName('background-popup')[0].classList.remove('show')
			document.getElementsByClassName('background-popup')[0].classList.add('dont-show')
		},
		openRegister() {
			this.regPage = !this.regPage
			this.authPage = !this.authPage
		},
		saveMod(id, event) {
			ym(90056738,'reachGoal','save_mod')
			const form = new FormData();
			form.append("ID", id);
			fetch('/ajax/saved.php', {method: 'post', body: form})
				.then(response => response.json())
				.then(response => {
					// console.log(response)
				})
				.catch(err => console.log(err))

			let spinner = `<svg xmlns="http://www.w3.org/2000/svg" class="rotating" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>`
			let downloaded = `Сохранено
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>`
			event.innerHTML = downloaded

			event.innerHTML = spinner
			setTimeout(function () {
			    event.classList.add('disabled')
				event.innerHTML = downloaded
			}, 500);
		},
		saveModDetail(id, event) {
			ym(90056738,'reachGoal','save_mod')
			const startBtn = event.innerHTML
			const form = new FormData()
			form.append("ID", id)
			fetch('/ajax/saved.php', {method: 'post', body: form})
				.then(response => response.json())
				.then(response => console.log(response))
				.catch(err => console.log(err))

			let spinner = `<svg xmlns="http://www.w3.org/2000/svg" class="rotating" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>`

			event.innerHTML = spinner
			setTimeout(function () {
				event.innerHTML = startBtn
			    event.classList.add('disabled')
			}, 500);
		},
		downloadCallback() {
			let spinner = `<svg xmlns="http://www.w3.org/2000/svg" class="rotating" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>`
			let downloaded = `Мод скачен
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>`;

			this.downloadButtonContent = spinner;
			this.downloadButtonContentForDetail = spinner;
			let self = this;
			setTimeout(function () {
			    self.downloadButtonDisabled = true;
				self.downloadButtonContent = downloaded;
				self.downloadButtonContentForDetail = downloaded;
			}, 1000);
		},
		downloadCallbackList(event) {
			let spinner = `<svg xmlns="http://www.w3.org/2000/svg" class="rotating" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>`;
			let downloaded = `Мод скачен
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>`;
			event.innerHTML = downloaded;

			event.innerHTML = spinner;
			let self = this;
			setTimeout(function () {
			    event.classList.add('disabled');
				event.innerHTML = downloaded;
			}, 1000);
		},
		addOrUpdateUrlParam(name, value) {
			var l = window.location;
			var params = {};
			var x = /(?:\??)([^=&?]+)=?([^&?]*)/g;
			var s = l.search;
			for(var r = x.exec(s); r; r = x.exec(s))
			{
				r[1] = decodeURIComponent(r[1]);
				if (!r[2]) r[2] = '%%';
				params[r[1]] = r[2];
			}

			params[name] = encodeURIComponent(value);

			var search = [];
			for(var i in params)
			{
				var p = encodeURIComponent(i);
				var v = params[i];
				if (v != '%%') p += '=' + v;
				search.push(p);
			}
			search = search.join('&');

			l.search = search;
		},
		filterCount(event) {
			this.addOrUpdateUrlParam('count', event.target.value);
		},
		filterSort(event) {
			this.addOrUpdateUrlParam('sort', event.target.value);
		},
		filterSearch() {
			location.href = '/the-sims4/?search='+document.getElementById('search-bar').value
			// this.addOrUpdateUrlParam('search', document.getElementById('search-bar').value);
		},
		clearSearch() {
			if(document.getElementById('search-bar').value) {
				this.addOrUpdateUrlParam('search', '');
			}
		},
		pagination(value) {
			this.addOrUpdateUrlParam('PAGEN_1', value);
		},
		onEnterSearch() {
			location.href = '/the-sims4/?search='+document.getElementById('search-bar').value
			// this.addOrUpdateUrlParam('search', document.getElementById('search-bar').value);
		}
	}
})


//main.js

window.onload = () => {

	//плавное перемещение по тегу  
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    }

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
				document.getElementsByClassName('nav-link')[0].classList.remove('active')
				document.getElementsByClassName('nav-link')[3].classList.add('active')
            } else {
				document.getElementsByClassName('nav-link')[0].classList.add('active')
				document.getElementsByClassName('nav-link')[3].classList.remove('active')
			}
        })
    }, options)

	if(document.querySelectorAll('#faq')) {
		const arr = document.querySelectorAll('#faq')
		arr.forEach(i => {
			observer.observe(i)
		})
	}
}
