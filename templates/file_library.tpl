<ul>
   {section loop=$files name=i}
			<li>
            <a  href='{$files[i].file}'  title="{$files[i].name}">            
            {$files[i].name}</a>
			</li>
    {/section}  
</ul>
