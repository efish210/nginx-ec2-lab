// JavaScript Document
var addBtn = document.getElementById('addToList');
var shoppingList = document.getElementById('shoppingList');
var listNewItem = document.getElementById('newItem');
var counter = document.getElementById('counter')
function addItem(){
	var item = listNewItem.value.trim();
	if(item == ''){ //No NULL/empty list items
		return;
	}
	var newEl, newElText;
	var deleteBtn, deleteSpan;
	newEl = document.createElement('div');
	newElText = document.createTextNode(item);
	newEl.appendChild(newElText);
	newEl.classList.add('alert');
	newEl.classList.add('alert-info');
	
	deleteBtn = document.createElement('button');
	deleteBtn.setAttribute('type', 'button');
	deleteBtn.classList.add('close');
	
	deleteSpan = document.createElement('span');
	deleteSpan.appendChild(document.createTextNode('x'));
	
	deleteBtn.appendChild(deleteSpan)
	newEl.appendChild(deleteBtn);
	
	deleteBtn.addEventListener('click', deleteItem, false);
	
	
	
	
	
	shoppingList.appendChild(newEl);
	counter.textContent = shoppingList.children.length;
	listNewItem.value = '';
}

function deleteItem(){
	var listItem = this.parentElement;
	shoppingList.removeChild(listItem);
	counter.textContent = shoppingList.children.length;
}

addBtn.addEventListener('click', addItem, false);

var existingBtn = document.getElementsByClassName('close')[0];
existingBtn.addEventListener('click', deleteItem, false);

