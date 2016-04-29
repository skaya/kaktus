/*
 *	20.06.2005 17:27
 *	InputPlaceholder Class v 0.1a
 *
 *	30.06.2005 20:36
 *	InputPlaceholder Class v 0.1b
 *
 *	01.07.2005 18:30
 *	InputPlaceholder Class v 0.1c
 */

/*	������:
 *		�����������
 *
 *	��������
 *		Input			������� �����, � ������� ��������
 *		Value			�������� ������� �� ���������
 *		CssFilled		��� css-������ ��� ����������� ����������� ����
 *		CssEmpty		��� css-������ ��� ����������� ������� ����
 */

/*	�����������
 *	���������:
 *		input			������� ����� ( input[@type='text'] ), � ������� ��������
 *		value			�������� ������� �� ���������, �. �. ��� ����� placeholder
 *		cssFilled		��� css-������ ��� ����������� ����������� ���� (����������� � input)
 *		cssEmpty		��� css-������ ��� ����������� ������� ���� (����������� � input)
 */
/*
	� �� ������, � ������ ����� ���������.
*/
function InputPlaceholder (input, value, cssFilled, cssEmpty)
{
	var thisCopy = this
	
	this.Input = input
	this.Value = value
	this.SaveOriginal = (input.value == value)
	this.CssFilled = cssFilled
	this.CssEmpty = cssEmpty

	this.setupEvent (this.Input, 'focus', function() {return thisCopy.onFocus()})
	this.setupEvent (this.Input, 'blur',  function() {return thisCopy.onBlur()})
	this.setupEvent (this.Input, 'keydown', function() {return thisCopy.onKeyDown()})

	if (input.value == '') this.onBlur();

	return this
}

InputPlaceholder.prototype.setupEvent = function (elem, eventType, handler)
{
	if (elem.attachEvent)
	{
		elem.attachEvent ('on' + eventType, handler)
	}

	if (elem.addEventListener)
	{
		elem.addEventListener (eventType, handler, false)
	}
}

InputPlaceholder.prototype.onFocus = function()
{
	if (!this.SaveOriginal &&  this.Input.value == this.Value)
	{
		this.Input.value = ''
	}
	else
	{
			//this.Input.className = ''
	}
}

InputPlaceholder.prototype.onKeyDown = function()
{
	//this.Input.className = ''
}

InputPlaceholder.prototype.onBlur = function()
{
	if (this.Input.value == '' || this.Input.value == this.Value)
	{
		this.Input.value = this.Value
		this.Input.className = this.CssEmpty
	}
	else
	{
		this.Input.className = this.CssFilled
	}
}
