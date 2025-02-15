<?php

namespace Mokakustudio\PhpFormBuilder;

class FormScript
{
    public static function switcherScript()
    {
        return "
         <script>
            function toggleSwitch(uniqueId) {
                const toggleBall = document.getElementById('ball-' + uniqueId);
                toggleBall.classList.toggle('translate-x-full');
                toggleBall.classList.toggle('translate-x-0');
                toggleBall.classList.toggle('bg-green-500'); // Change color when checked
                toggleBall.classList.toggle('bg-white'); // Change color when unchecked
            }
        </script>
        ";
    }

    public static function tabScript($firstTabId)
    {
        return "
        <script>
           function openTab(tabId, button) {
                const tabs = document.querySelectorAll('.tab-panel');
                const buttons = document.querySelectorAll('.tab-header');
                
                // Hide all tabs
                tabs.forEach(tab => tab.classList.add('hidden'));

                // Show the active tab
                const activeTab = document.getElementById(tabId);
                if (activeTab) {
                    activeTab.classList.remove('hidden');

                    // Remove active styles from all buttons
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-blue-500', 'text-white');
                        btn.classList.add('text-gray-700'); // Set inactive button styles
                    });

                    // Set the active button styles
                    button.classList.add('bg-blue-500', 'text-white');
                    button.classList.remove('text-gray-700'); // Remove text color for active button
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                openTab('{$firstTabId[0]}', document.querySelector('.tab-header')); // Open the first tab by default
            });
        </script>
        ";
    }

    public static function addSelectAjaxScript($uniqueId)
    {
        return "
        <script>
        function fetchOptions(uniqueId, apiEndpoint, itemsKey, textKey, valueKey) {
            const input = document.getElementById('search-' + uniqueId);
            const optionsList = document.getElementById('options-' + uniqueId);
            const query = input.value;

            if (query.length < 2) {
                optionsList.innerHTML = '';
                optionsList.classList.add('hidden');
                return;
            }

            fetch(apiEndpoint + '?query=' + encodeURIComponent(query))
                .then(response => response.json())
                .then(data => {
                    optionsList.innerHTML = '';

                    // Check if the specified itemsKey exists and is an array
                    if (data[itemsKey] && Array.isArray(data[itemsKey])) {
                        data[itemsKey].forEach(item => {
                            const li = document.createElement('li');
                            li.textContent = item[textKey]; // Use the specified text key
                            li.setAttribute('data-value', item[valueKey]); // Use the specified value key
                            li.className = 'p-2 cursor-pointer hover:bg-gray-200';
                            li.onclick = function() {
                                input.value = item[textKey]; // Set the input value
                                optionsList.classList.add('hidden'); // Hide options after selection
                                
                                // Optionally, you can set the selected value in a hidden input
                                const hiddenInput = document.createElement('input');
                                hiddenInput.type = 'hidden';
                                hiddenInput.name = uniqueId; // Set the name for the selected value
                                hiddenInput.value = item[valueKey]; // Set the value for the selected item
                                input.parentNode.appendChild(hiddenInput);
                            };
                            optionsList.appendChild(li);
                        });
                        optionsList.classList.remove('hidden');
                    } else {
                        console.error('Expected an array but received:', data[itemsKey]);
                        optionsList.innerHTML = '<li class=\"p-2\">No results found</li>';
                        optionsList.classList.remove('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error fetching options:', error);
                });
        }

        document.addEventListener('click', function(event) {
            const target = event.target;
            const optionsList = document.getElementById('options-{$uniqueId}');
            if (!target.closest('.relative')) {
                if (optionsList) optionsList.classList.add('hidden');
            }
        });
    </script>
        ";
    }

    public static function addSearchableSelectScript($uniqueId)
    {
        return "
        <script>
            function filterOptions(input) {
                const filter = input.value.toLowerCase();
                const ul = input.nextElementSibling;
                const options = ul.getElementsByTagName('li');
                let hasVisibleOptions = false;

                for (let i = 0; i < options.length; i++) {
                    const item = options[i];
                    if (item.innerText.toLowerCase().includes(filter)) {
                        item.style.display = '';
                        hasVisibleOptions = true;
                    } else {
                        item.style.display = 'none';
                    }
                }
                ul.style.display = hasVisibleOptions ? 'block' : 'none';
            }

            document.addEventListener('click', function(event) {
                const target = event.target;
                if (!target.closest('.relative')) {
                    const optionList = document.querySelector('#options-{$uniqueId}');
                    if (optionList) optionList.style.display = 'none';
                }
            });

            document.querySelectorAll('#options-{$uniqueId} li').forEach(item => {
                item.addEventListener('click', function () {
                    const input = document.getElementById('search-{$uniqueId}');
                    input.value = this.innerText;
                    this.parentNode.style.display = 'none';
                });
            });
        </script>
        ";
    }

}