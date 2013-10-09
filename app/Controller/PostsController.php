<?php 
/**
* 
*/
class PostsController extends AppController
{
	public $name = 'Posts';
	public $helpers = array('Html' ,'Form');
	public $components = array('Session');

	public function index()
	{
		$this->set('posts', $this->Post->find('all'));
	}

	public function view($id = null)
	{
		$this->Post->id = $id;	//获取到文章$id，赋予Post模型对象的id属性
		$this->set('post', $this->Post->read());
	}

	public function add()
	{
		if ($this->request->is('post')) {
			if ($this->Post->save(($this->request->data))) {
				$this->Session->setFlash('新文章创建成功');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('创建文章出错');
			}
		}
	}

	public function edit($id = null)
	{
		$this->Post->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Post->read();
		} else {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('文章更新成功');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('文章更新失败');
			}
		}
	}

	public function delete($id)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Error Processing Request", 1);
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash('ID为'.$id.'的文章删除成功');
			$this->redirect(array('action' => 'index'));
		}
	}
}