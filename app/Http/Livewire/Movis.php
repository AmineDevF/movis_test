<?php
  
namespace App\Http\Livewire;

use Livewire\WithPagination;

use App\Models\Movies;
use Livewire\Component;
  
class Movis extends Component
{
    use WithPagination;

    public   $title, $overview, $movies_id ,$release_date ;
    public $isOpen = 0;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $movies  = Movies::paginate(4);
        return view('livewire.movies', ['movies' => $movies]);
     
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->overview = '';
        $this->movies_id = '';
        $this->release_date = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'overview' => 'required',
            'release_date' => 'required',
        ]);
   
        Movies::updateOrCreate(['id' => $this->movies_id], [
            'title' => $this->title,
            'overview' => $this->overview,
            'release_date' => $this->release_date
        ]);
  
        session()->flash('message', 
            $this->movies_id ? 'Movies Updated Successfully.' : 'Movies Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $movies = Movies::findOrFail($id);
        $this->movies_id = $id;
        $this->title = $movies->title;
        $this->overview = $movies->overview;
        $this->release_date =  $movies->release_date;
    
        $this->openModal();
    }
    public function crt()
    {
        return redirect(request()->header('Referer'));
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Movies::find($id)->delete();
        session()->flash('message', 'Movies Deleted Successfully.');
    }
}