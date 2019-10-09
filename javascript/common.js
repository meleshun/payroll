// Maximum wage calculation (on edit form) - line 5
// Sorting by amount of products or total salary or departments (on view form) - line 27
// Search by workers name on view form - line 54

document.addEventListener('DOMContentLoaded', function() {
	
	// Maximum wage calculation (on edit form).
	var amount = document.getElementsByClassName('form__amount');
	for (var i=0; i<amount.length; ++i) {
		amount[i].addEventListener('input', function() {

			var amount = +this.value;
			var price = +this.getAttribute('data-price');
			var percent = 0.15;
			var maxPrice = 1500;

			var salary = (price * amount * percent);

			this.setAttribute('max', (maxPrice/(price*percent)));

			if (salary <= maxPrice) {
				this.parentNode.parentNode.getElementsByClassName('form__salary')[0].value = salary;
			}
		}, false);
	}

	// Sorting by amount of products or total salary or departments (on view form).
	var filter = document.querySelectorAll('.form__nav [data-sort]')
	for (var i=0; i<filter.length; ++i) {
		filter[i].addEventListener('click', function() {
			
			if (this.className == '') {
				for (var i=0; i<filter.length; ++i) {
					filter[i].className = '';
				}
			}

			switch(this.className) {
				case 'decrease' : this.className = 'increase'; break;
				case 'increase' : this.className = 'decrease'; break;
				default : this.className = 'decrease';
			}

			var name = '[data-sort="'+this.getAttribute('data-sort')+'"]';
			if (this.className == 'decrease') {
				sort(name);
			} else {
				sort(name, 1);
			}
			
		}, false);
	}

	// Search by workers name on view form
	var workers = document.querySelectorAll('.form__worker td:nth-child(1)')
	var workersArray = [];
	for (var i=0; i<workers.length; ++i) {
		workersArray.push(workers[i].getAttribute('data-search'));
	}

	var search = document.getElementById('search');
	if (typeof(search) != 'undefined' && search != null) {
		search.addEventListener('input', function(e) {

			for (var i=0; i<workers.length; ++i) {
				workers[i].parentNode.classList.remove('visible');
			}

			if (this.value == '') {
				for (var i=0; i<workers.length; ++i) {
					workers[i].parentNode.classList.add('visible');
				}
				return;
			}

			if (typeof workersArray[this.value] === 'undefined') {
				var exp = '.form__worker td[data-search="'+this.value+'"]';
				var elem = document.querySelectorAll(exp);
				for (var i=0; i<elem.length; ++i) {
					elem[i].parentNode.classList.add('visible');
				}
			}

		});
	}

});

function sort(param, reverse) {
	var nodeList = document.querySelectorAll('.form__worker tr');
	var itemsArray = [];
	var parent = nodeList[0].parentNode;
	for (var i = 0; i < nodeList.length; i++) {    
	  itemsArray.push(parent.removeChild(nodeList[i]));
	}

	itemsArray.sort(function(nodeA, nodeB) {

    var textA = nodeA.querySelector(param).textContent;
    var textB = nodeB.querySelector(param).textContent;

    var numberA, numberB;
    if (!isNaN(parseFloat(textA)) && !isNaN(textA - 0)) {
			numberA = parseInt(textA);
			numberB = parseInt(textB);
    } else {
			numberA = textA;
			numberB = textB;
    }

    if (numberA < numberB) {
      return reverse ? 1 : -1;
    }
    if (numberA > numberB) { 
      return reverse ? -1 : 1;
    }
    return 0;
  })
  .forEach(function(node) {
    parent.appendChild(node)
  });
}