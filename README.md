# CakePHP Split Form Helper
This helper allows you to break apart multi-selects, checkbox groups, and radio groups into multiple places on the page.

If you've ever wanted something like:

> __[ ] Choice A__

> This choice would give you lots of options such as:

> - Long hair
> - Youthful vigor
> - STDs
>
> __[ ] Choice B__

> This is the wrong choice. People who select it are:

> - Morons
> - Short
> - Have ED

This allows you to add content in between the form inputs. You can also separate inputs into small groups.

> __Fruits:__

> - ( ) Apple
> - ( ) Orange 
> - ( ) Pair

> __Vegatables:__

> - ( ) Cabbage
> - ( ) Carrots
> - ( ) Potatoes

## How to use
1. Clone/Download to <code>plugins/split_form</code>
2. Add the helper to your controller 
<code>var $helpers = array('SplitForm.SplitForm');</code>
3. Set the view variable in the controller 
<code>$this->set('categories', $this->Post->Category->find('list'));</code>
4. Call the method:

#### For one specific value
<pre>echo $this->SplitForm->input('Category', 7);</pre>

#### For multiple inputs
<pre>echo $this->SplitForm->input('Category', array(3, 2, 6, 7));</pre>

#### Advanced options
<pre>echo $this->SplitForm->input('Category', array(
	3 => 'Category 3', 
	2 => array('label' => 'Category 2', 'class' => 'special')
), array('legend' => 'Category group 1'));</pre>