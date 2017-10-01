<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* Files Controller
*
* @property \App\Model\Table\FilesTable $Files
*
* @method \App\Model\Entity\File[] paginate($object = null, array $settings = [])
*/
class FilesController extends AppController
{
    
    /**
    * Index method
    *
    * @return \Cake\Http\Response|void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EvidenceItems']
        ];
        $files = $this->paginate($this->Files);
        
        $this->set(compact('files'));
        $this->set('_serialize', ['files']);
    }
    
    /**
    * View method
    *
    * @param string|null $id File id.
    * @return \Cake\Http\Response|void
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['EvidenceItems']
        ]);
        
        $this->set('file', $file);
        $this->set('_serialize', ['file']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $evidenceItems = $this->Files->EvidenceItems->find('list', ['limit' => 200])->toArray();
        
        if (count($evidenceItems) == 0) {
            $this->redirect($this->referer());
            $this->Flash->error(__('No evidence item is in the database, no new file can be linked to an item.'));
        } else {
            
            $file = $this->Files->newEntity();
            if ($this->request->is('post')) {
                
                if (!empty($this->request->data['name']['name'])) {
                    
                    $fileName = $this->request->data['name']['name'];
                    $uploadPath = 'files\\';
                    $uploadFile = WWW_ROOT . 'img\\' . $uploadPath . $fileName;
                    
                    if (move_uploaded_file($this->request->data['name']['tmp_name'], $uploadFile)) {
                        
                        $file = $this->Files->patchEntity($file, $this->request->getData());
                        $file->name = $fileName;
                        $file->path = $uploadPath;
                        
                        if ($this->Files->save($file)) {
                            $this->redirect(['action' => index]);
                            $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                        } else {
                            $this->Flash->error(__('Unable to upload file, please try again.'));
                        }
                        
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Please choose a file to upload.'));
                }
                
            }
            
            $evidenceItems = $this->Files->EvidenceItems->find('list', ['limit' => 200]);
            $this->set(compact('file', 'evidenceItems'));
            $this->set('_serialize', ['file']);
            
        }
        
    }
    
    /**
    * Edit method
    *
    * @param string|null $id File id.
    * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $evidenceItems = $this->Files->EvidenceItems->find('list', ['limit' => 200]);
        $this->set(compact('file', 'evidenceItems'));
        $this->set('_serialize', ['file']);
    }
    
    /**
    * Delete method
    *
    * @param string|null $id File id.
    * @return \Cake\Http\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
