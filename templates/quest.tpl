<ol style="cursor:pointer">
{section loop=$quest name=f}
		
            <li>
            <div class="quest" id="{$quest[f].id}">{$quest[f].text}</div>
            <ul id="answ{$quest[f].id}" style="display:none;" class="answer">
                <li>
                <div>{$quest[f].answer}</div>
                </li>
            </ul>
            </li>
		
	{/section}
   </ol>