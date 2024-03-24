<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                TextInput::make('product_name')->label('Product Name')->required(),
                TextInput::make('brand')->label('Brand')->required(),
                RichEditor::make('product_description')->label('Product Description')->required(),
                Select::make('Category')->options([
                    'Laptop' => 'Laptop',
                    'Monitor' => 'Monitor',
                    'Mouse' => 'Mouse',
                    'Keyboard' => 'Keyboard',
                    'Headset' => 'Headset',
                ])->required(),
                TextInput::make('price')->label('Price')->numeric()->placeholder('Enter price (e.g., 123.45)')
                    ->required(),
            TextInput::make('stock')->label('Stock')->numeric()->integer()
                ->required(),
                TextInput::make('images')->label('Image')->required()

            ]);
    }




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('product_name')->label('Product Name')->searchable()->sortable(),
                TextColumn::make('brand')->label('Brand')->searchable()->sortable(),
                TextColumn::make('category')->label('Category')->sortable()->searchable(),
                TextColumn::make('price')->label('Price')->numeric()->searchable()->sortable(),
                TextColumn::make('stock')->label('Stock')->numeric()->searchable()->sortable(),
                TextColumn::make('images')->label('Images')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
